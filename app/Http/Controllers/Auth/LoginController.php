<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath(): string
    {
        return route(home_route());
    }

    /**
     * @return Factory|View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username(): string
    {
        $login = request()->input('data');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([
            $field => $login
        ]);

        return $field;
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     */
    protected function validateLogin(Request $request): void
    {
        $messages = [
            'data.required' => __('El campo usuario o correo electrónico es obligatorio.'),
            'email.exists' => __('La dirección de correo suministrada no existe.'),
            'username.exists' => __('El usuario suministrado no existe.'),
            'password.required' => __('El campo contraseña es obligatorio.'),
            'g-recaptcha-response.required_if' => __('El campo :attribute es obligatorio.', ['attribute' => 'captcha']),
        ];

        $request->validate([
            'data' => 'required|string',
            'password' => PasswordRules::login(),
            'email' => 'string|exists:users,email',
            'username' => 'string|exists:users,username',
            'g-recaptcha-response' => ['required_if:captcha_status,true', 'captcha'],
        ], $messages);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        $field = filter_var($request->input('data'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $request->only($field, 'password');
    }

    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request): void
    {
        throw ValidationException::withMessages([
            $this->username() => [__('Las credenciales no se han encontrado.')],
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param         $user
     *
     * @throws GeneralException
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        // Check to see if the users account is confirmed and active
        if (! $user->isConfirmed()) {
            auth()->logout();

            // If the user is pending (account approval is on)
            if ($user->isPending()) {
                throw new GeneralException(__('Su cuenta está actualmente pendiente de aprobación.'));
            }

            // Otherwise see if they want to resent the confirmation e-mail
            throw new GeneralException(__('Su cuenta no ha sido verificada todavía. Por favor, revise su e-mail, o 
                <a href=":url">
                    pulse aquí
                </a> 
                    para re-enviar el correo de verificación.', [
                'url' => route('frontend.auth.account.confirm.resend', e($user->{$user->getUuidName()}))
            ]));
        }

        if (! $user->isActive()) {
            auth()->logout();

            throw new GeneralException(__('Su cuenta ha sido desactivada.'));
        }

        $user->settings()->set('representante', $user->full_name);

        event(new UserLoggedIn($user));

        if (config('access.users.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function logout(Request $request): Response
    {
        // Remove the socialite session variable if exists
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

        // Fire event, Log out user, Redirect
        event(new UserLoggedOut($request->user()));

        // Laravel specific logic
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('frontend.auth.login');
    }
}

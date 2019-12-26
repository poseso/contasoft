<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use App\Repositories\Auth\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\User\ResetPasswordRequest;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $token
     *
     * @return View
     */
    public function showResetForm($token = null)
    {
        if (! $token) {
            return redirect()->route('frontend.auth.password.email');
        }

        $user = $this->userRepository->findByPasswordResetToken($token);

        if ($user && resolve('auth.password.broker')->tokenExists($user, $token)) {
            return view('auth.passwords.reset')
                ->withToken($token)
                ->withEmail($user->email);
        }

        return redirect()->route('frontend.auth.password.email')
            ->withFlashDanger(__('Hubo un problema al restablecer su contraseña. Por favor, vuelva a enviar el correo electrónico de restablecimiento de contraseña.'));
    }

    /**
     * Reset the given user's password.
     *
     * @param  ResetPasswordRequest  $request
     * @return RedirectResponse|JsonResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response === Password::PASSWORD_RESET
            ? $this->sendResetResponse(__('La contraseña ha sido reestablecida correctamente.'))
            : $this->sendResetFailedResponse($request, __('Hubo un problema al reestablecer la contraseña.'));
    }

    /**
     * Reset the given user's password.
     *
     * @param  CanResetPassword  $user
     * @param  string  $password
     */
    protected function resetPassword($user, $password)
    {
        $user->password = $password;

        $user->password_changed_at = now();

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return RedirectResponse
     */
    protected function sendResetResponse($response)
    {
        return redirect()->route(home_route())->withFlashSuccess(e(trans($response)));
    }
}

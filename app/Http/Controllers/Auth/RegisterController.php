<?php

namespace App\Http\Controllers\Auth;

use Throwable;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Events\User\UserRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     *@throws Throwable
     * @return RedirectResponse|Redirector
     */
    public function register(RegisterRequest $request)
    {
        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->createFront($request->only(
            'first_name',
            'last_name',
            'username',
            'email',
            'password'
        ));

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    __('Su cuenta fue creada con éxito y está pendiente de aprobación. Se enviará un correo electrónico cuando su cuenta sea aprobada.') :
                    __('Su cuenta ha sido creada. Le hemos enviado un correo electrónico con un enlace de verificación.')
            );
        }

        auth()->login($user);

        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}

<?php

namespace App\Http\Controllers\User;

use Exception;
use Throwable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\UpdateProfileRequest;

/**
 * Class ProfileController.
 */
class UserProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @throws GeneralException
     * @throws Exception
     * @throws Throwable
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userRepository->updateFront(
            $request->user()->id,
            $request->only('first_name', 'last_name', 'username', 'email', 'avatar_type', 'avatar_location'),
            $request->has('avatar_location') ? $request->file('avatar_location') : false
        );

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(__('Debe confirmar su nueva dirección de correo electrónico antes de poder iniciar sesión nuevamente.'));
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('Cuenta actualizada correctamente.'));
    }
}

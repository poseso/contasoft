<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\UpdatePasswordRequest;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController extends Controller
{
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
     * @param UpdatePasswordRequest $request
     *
     * @throws GeneralException
     * @return mixed
     */
    public function update(UpdatePasswordRequest $request)
    {
        $this->userRepository->updatePassword($request->only('old_password', 'password'));

        return redirect()->to(route('frontend.user.account').'#password')->withFlashSuccess(__('Contraseña actualizada correctamente.'));
    }
}

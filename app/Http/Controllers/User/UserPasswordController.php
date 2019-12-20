<?php

namespace App\Http\Controllers\User;

use App\Models\Auth\User;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\ManageUserRequest;
use App\Http\Requests\User\UpdateUserPasswordRequest;

/**
 * Class UserPasswordController.
 */
class UserPasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, User $user)
    {
        return view('user.change-password')
            ->withUser($user);
    }

    /**
     * @param UpdateUserPasswordRequest $request
     * @param User                      $user
     *
     * @throws GeneralException
     * @return mixed
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userRepository->updatePassword($user, $request->only('password'));

        return redirect()->route('admin.user.index')->withFlashSuccess(__('La contraseña fue actualizada correctamente.'));
    }
}

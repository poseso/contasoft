<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\UpdatePasswordRequest;

/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController extends Controller
{
    /**
     * @return Factory|View
     */
    public function expired()
    {
        abort_unless(config('access.users.password_expires_days'), 404);

        return view('frontend.auth.passwords.expired');
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param UserRepository        $userRepository
     *
     * @throws GeneralException
     * @return mixed
     */
    public function update(UpdatePasswordRequest $request, UserRepository $userRepository)
    {
        abort_unless(config('access.users.password_expires_days'), 404);

        $userRepository->updatePassword($request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')
            ->withFlashSuccess(__('Contraseña actualizada correctamente.'));
    }
}

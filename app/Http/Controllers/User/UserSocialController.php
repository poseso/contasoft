<?php

namespace App\Http\Controllers\User;

use App\Models\Auth\User;
use App\Models\Auth\SocialAccount;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\SocialRepository;
use App\Http\Requests\User\ManageUserRequest;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SocialRepository  $socialRepository
     * @param User              $user
     * @param SocialAccount     $social
     *
     * @throws GeneralException
     * @return mixed
     */
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('La cuenta social fue eliminada correctamente.'));
    }
}

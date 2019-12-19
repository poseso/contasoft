<?php

namespace App\Http\Controllers\User;

use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepository;
use App\Http\Requests\User\ManageUserRequest;
use Throwable;

/**
 * Class UserStatusController.
 */
class UserStatusController extends Controller
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
     *
     * @return mixed
     */
    public function getDeactivated(ManageUserRequest $request)
    {
        return view('user.deactivated')
            ->withUsers($this->userRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageUserRequest $request)
    {
        return view('user.deleted')
            ->withUsers($this->userRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     * @param                   $status
     *
     * @throws GeneralException
     * @return mixed
     */
    public function mark(ManageUserRequest $request, User $user, $status)
    {
        $this->userRepository->mark($user, (int) $status);

        return redirect()->route(
            (int) $status === 1 ?
                'admin.user.index' :
                'admin.user.deactivated'
        )->withFlashSuccess(__("El usuario $user->full_name fue actualizado correctamente."));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @throws GeneralException
     * @throws Throwable
     * @return mixed
     */
    public function delete(ManageUserRequest $request, User $deletedUser)
    {
        $this->userRepository->forceDelete($deletedUser);

        return redirect()->route('admin.user.deleted')->withFlashSuccess(__("El usuario $deletedUser->full_name fue eliminado de forma permanente."));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $deletedUser
     *
     * @throws GeneralException
     * @return mixed
     */
    public function restore(ManageUserRequest $request, User $deletedUser)
    {
        $this->userRepository->restore($deletedUser);

        return redirect()->route('admin.user.index')->withFlashSuccess(__("El usuario $deletedUser->full_name fue restaurado correctamente."));
    }
}

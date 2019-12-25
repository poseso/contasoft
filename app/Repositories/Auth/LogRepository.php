<?php

namespace App\Repositories\Auth;

use App\Models\Auth\User;
use App\Models\Auth\UserLog;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository.
 */
class LogRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param UserLog $model
     */
    public function __construct(UserLog $model)
    {
        $this->model = $model;
    }

}

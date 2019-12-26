<?php

namespace App\Repositories\Auth;

use App\Models\Auth\UserLog;
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

<?php

namespace App\Http\Controllers\User;

use App\Models\Auth\UserLog;
use App\Http\Controllers\Controller;

/**
 * Class UserLogController.
 */
class UserLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
//        $ledgers = UserLog::get();
//        foreach ($ledgers as $ledger) {
//            $ledger->getData(true);
//        }

//        dd($ledgers->toArray());
        return view('logs.index')
            ->withLogs(UserLog::with('user', 'recordableUser')
            ->orderBy('id', 'desc')
            ->get());
    }

    public function show($id)
    {
        $log = UserLog::with('user', 'recordableUser')
            ->where('id', $id)
            ->first();

        $original = call_user_func([$log->recordable_type, 'select'])
            ->where('id', $log->id)
            ->first();

        return view('logs.show')
            ->withLog($log)
            ->withOriginal($original);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

/**
 * Class AccountController.
 */
class UserAccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class AccountController.
 */
class UserAccountController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('auth.user.account');
    }
}

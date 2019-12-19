<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

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

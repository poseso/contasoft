<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
use Poseso\Settings\Contracts\RepositoryContract as Settings;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @param Settings $settings
     * @return \Illuminate\View\View
     */
    public function index(Settings $settings)
    {
        $setting = $settings;
        $permissions = Permission::with('module')->selectRaw('module_id')->groupBy('module_id')->get();

        return view('dashboard', compact('permissions', 'setting'));
    }

    /**
     * Display a listing of Color Palette.
     */
    public function colores()
    {
        return view('colores');
    }
}

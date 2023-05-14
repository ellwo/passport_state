<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::guard('admin')->user();
        //     return $next($request);
        // });
        $this->middleware('auth');
    }


    public function index()
    {

        if (! Gate::allows('users_manage')) {
            return abort(403,'Sorry !! You pppare Unauthorized to view dashboard !');
        }
        // if (is_null($this->user) || !$this->user->can('dashboard.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        // }

        $total_roles = count(Role::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        return view('backend.pages.dashboard.index', compact('total_admins', 'total_roles', 'total_permissions'));
    }
}

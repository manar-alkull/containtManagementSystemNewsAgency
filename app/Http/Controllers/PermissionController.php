<?php

namespace App\Http\Controllers;

use App\Categories_language;
use App\Menu;
use App\Menus_language;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Categorie;
use App\Language;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    //

    public function index()
    {
        $roles= Role::all();
        $permissions= Permission::all();
        $languages =Language::all();

        return view('Permission.permission', compact("roles","permissions","languages"));
    }

    public function add(Request $request)
    {
        $role=Role::find($request->role_id);
        $role->permissions()->attach($request->permission_id);
        return back();
    }
    public function delete(Role $role ,Permission $permission)
    {
        $role->permissions()->detach($permission->id);
        return back();
    }
}

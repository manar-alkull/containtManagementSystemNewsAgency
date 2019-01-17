<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;

class checkRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user =$request->user();
        if (!$user){
            return redirect(url("/login"));
        }
        $action=$request->route()->getAction()["controller"];

        $controller = preg_replace('/.*\\\/', '', $action);

        if (!$action){
            return redirect(url("/login"));
        }
        $permission= Permission::where("name",$controller)->first();

        if (!$permission){
            return redirect(url("/login"));
        }
        $role=$user->role()->get()->first();
        if (!($role->permissions()->where("permission_id",$permission->id)->first())){
            return redirect(url("/login"));
        }
        return $next($request);
    }
}

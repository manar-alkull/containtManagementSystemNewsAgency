<?php

namespace App\Http\Controllers;

use App\Categories_language;
use App\Menu;
use App\Menus_language;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Categorie;
use App\Language;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //

    public function index()
    {
        $users= User::all();
        $languages =Language::all();

        return view('user.user', compact("users","languages"));
    }
    public function changeRole(Request $request, User $user){

        $user->role=$request->role;
        $user->save();

        $response = array(
             'status' => 'success',
             'msg' => 'Setting created successfully',
         );
        return \Response::json($response);
    }
}

<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Categories_meta;
use App\item;
use App\Language;
use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TemplateController extends Controller
{
    //
    public function index()
    {

        if (Auth::guest()){
            session(["lang" => 1]);
        }
        $menus=Menu::all();
        $languages=Language::all();
        $category=Categorie::where("name","home")->findOrFail(1);


        return view('template',compact("menus","category","languages"));
    }
    public function showCategory(Categorie $categorie){
        $meta =$categorie->Categories_metas()->get();
        $languages=Language::all();
        if (Auth::guest()){
            session(["lang" => 1]);
        }
        $menus=Menu::all();

        $topItems= null;
        if ($categorie->items()->get()->first()) {
            $topItems = $categorie->items()->get()->first()->orderBy("created_at", true)->get()->take(5);
        }

//        var_dump($topItems);
//        die();
        return view('category',compact("menus","categorie","languages","topItems","meta"));
    }
    public function showItemPerPage(Categorie $categorie){


        if (Auth::guest()){
            session(["lang" => 1]);
        }
        $menus=Menu::all();
        $item=$categorie->items()->get()->first();
        if($item){
            $meta= $item->Items_metas()->get();
        }
        $languages=Language::all();
        return view('Items.itemPerPage',compact("menus","languages","categorie","item","meta"));
    }
    public function showFormPerPage(Categorie $categorie){

        if (Auth::guest()){
            session(["lang" => 1]);
        }
        $menus=Menu::all();
        $item=$categorie->items()->get()->first();
        if($item){
            $meta= $item->Items_metas()->get();
        }
        $languages=Language::all();
        return view('Items.formPerPage',compact("menus","languages","categorie","item","meta"));
    }

    public function showCategoryList(Categorie $parent){
        $languages=Language::all();
        if (Auth::guest()){
            session(["lang" => 1]);
        }
        $menus=Menu::all();
        $meta=$parent->Categories_metas()->get();
        return view('categoryList',compact("menus","languages","parent","meta"));
    }
}

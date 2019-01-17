<?php

namespace App\Http\Controllers;

use App\Language;
use App\Menus_language;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;
use App\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function __construct()
    {
//        $this->middleware("role");
    }
    public function index()
    {
        $menus = Menu::all();
        $categories = Categorie::all()->where("parent_id",null);
        $languages =Language::all();
        $menus_languages=Menus_language::all();
//        foreach ($categories as $category) {
//            //var_dump($category->Categories_languages());
//            //die();
//            foreach ($category->Categories_languages()->get() as $lang){
//                var_dump( $lang->name."<br>");
//            }
//        }
//        die();

        return view('Menu.menu', compact("menus","categories","languages","menus_languages"));
    }

    public function add(Request $request)
    {
        $menu_language =new Menus_language();
        $menu = new Menu();
        $languages=Language::all();
        $menu->type = $request->type;
        $menu->position = 0;
        $menu->priority = $request->priority;
        if ($request->parent_id){
            $menu->parent_id = $request->parent_id;
            $parent = Menu::findOrFail($menu->parent_id);
            if ($parent) {
                if ($parent->type == "category") {
                    $parent->type = "list of categories";
                    $parent->save();
                }
            }
        }
        if ($menu->type == "category" || $menu->type == "item per page" || $menu->type == "form per page" ) {
            if ($request->cat_id){
                $menu->cat_id=$request->cat_id;
            }
        }
        $menu->save();

        foreach($languages as $language) {
            $temp="name_".$language->name;
            $menu_languages []=[
                'name'=> $request->$temp,
                'menu_id'=>$menu->id,
                'language_id'=>$language['id'],
            ];
        }
        Menus_language::insert($menu_languages);
        return back();
    }
    public function  delete(Menu $menu){
        DB::beginTransaction();
        if (!$menu->delete()) {
            DB::rollBack();
        }
        DB::commit();
        return redirect("menu");
    }
    public function  update(Menu $menu){
        $menus = Menu::all();
        $languages =Language::all();
        $categories = Categorie::all()->where("parent_id",null);
        $menus_languages=Menus_language::all();
        return view("Menu.update",compact('menu','menus','languages','menus_languages','categories'));
    }

    public function save(Request $request,Menu $menu){
        if ($request->parent_id){
            $menu->parent_id=$request->parent_id;
        }
        $menu->type=$request->type;
        $menu->cat_id=$request->cat_id;
        $menu->priority=$request->priority;

        $menu->save();
        foreach($menu->Menus_languages as $lang) {
            $temp="name_".$lang->name;
           DB::table('menus_languages')->where([['menu_id',$menu->id],['language_id',$lang->pivot->language_id]])->update( ['name'=> $request->get($temp)]);
        }

        return redirect(url("/menu"));
    }
}

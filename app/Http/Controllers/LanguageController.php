<?php

namespace App\Http\Controllers;

use App\Categories_language;
use App\Dictionary;
use App\Items_language;
use App\Language;
use App\Menus_language;
use Illuminate\Http\Request;

use App\Menu;
use App\Categorie;
use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = Language::all();
        return view('Languages.language',compact("languages"));
    }
    public function getlang()
    {
        $languages = Language::all();
        return Language::all();
    }
    public function add(Request $request)
    {
        $language = new Language();
        $language->name = $request->name;
        $language->save();
        \Schema::table('dictionarys', function (\Illuminate\Database\Schema\Blueprint $table) use ($language) {
            $table->char($language->name, 255);
        });
        DB::table('dictionarys')->update(['dictionarys.'.$language->name => DB::raw('dictionarys.English')]);

        $meuns=Menu::all();
        foreach ($meuns as $menu){
            $menuLang = new Menus_language();
            $menuLang->language_id=$language->id;
            $menuLang->menu_id=$menu->id;
            $menuLang->name=DB::table('menus_languages')->select('name')->where([['menu_id',$menu->id] ,['language_id',1]])->first()->name;
            $menuLang->save();
        }

        $categories=Categorie::all();
        foreach ($categories as $cat){
            $catLang = new Categories_language();
            $catLang->language_id=$language->id;
            $catLang->categorie_id=$cat->id;
            $catLang->name=DB::table('categories_languages')->select('name')->where([['categorie_id',$cat->id] ,['language_id',1]])->first()->name;
            $catLang->name=DB::table('categories_languages')->select('description')->where([['categorie_id',$cat->id] ,['language_id',1]])->first()->description;

            $catLang->save();
        }

        $items=Item::all();
        foreach ($items as $item){
            $itemLang = new Items_language();
            $itemLang->language_id=$language->id;
            $itemLang->item_id=$item->id;
            $temp=DB::table('items_languages')->select('*')->where([['item_id',$item->id] ,['language_id',1]])->first();
//            var_dump(DB::table('items_languages')->select('*')->where([['item_id',$item->id] ,['language_id',1]])->first());
//
//            var_dump("<br>-----------------------------------------------------------------<br>");
//
//            var_dump($temp->name);
            if ($temp) {
                $itemLang->name =$temp->name;
                $itemLang->content =$temp->content;
                $itemLang->title = $temp->title;
                $itemLang->description = $temp->description;
                $itemLang->image = $temp->image;
                $itemLang->image_title = $temp->image_title;
                $itemLang->image_alt = $temp->image_alt;
                $itemLang->save();
            }

        }

        return back();
    }
    public function  delete(Language $language){

       $language->Items_languages()->delete();
       $language->Items_metas()->delete();
       $language->Categories_languages()->delete();
       $language->Menus_languages()->delete();
        \Schema::table('dictionarys', function (\Illuminate\Database\Schema\Blueprint $table) use ($language) {
            $table->dropColumn($language->name);
        });
        $language->delete();
        return back();
    }

    public function  update(Language $language){
        $languages =Language::all();
        return view("Languages.update",compact('language','languages'));
    }

    public function save(Request $request,Language $language){
        //   \Schema::table('dictionarys', function (\Illuminate\Database\Schema\Blueprint $table) use ($language) {
        //       $table->renameColumn($language->name, $language->name);
        //   });
        $language->update($request->all());
        return redirect(url("/language"));
    }
    public function changeLanguageSession(Language $language){
        session(["lang" => $language->id]);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Categories_language;
use App\Categories_meta;
use App\Menu;
use App\Menus_language;
use App\PageTemplate;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Categorie;
use App\Language;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Categorie::all();
        $languages =Language::all();
        $cat_metas =Categories_meta::all();
        $pageTemplates =PageTemplate::all();
//        foreach ($categories as $category){
//            var_dump($category->id);
//            foreach ($category->Categories_languages as $lang){
//                var_dump($lang->name);
//            }
//        }
//        die();

        return view('Category.category', compact("categories","languages","cat_metas","pageTemplates"));
    }


    public function add(Request $request)
    {
        $category= new Categorie();
        $languages=Language::all();
        $category->template_id =$request->pageTemplate;
        if ($request->parent_id){
            $category->parent_id = $request->parent_id;
            //get menuitem for parent of the inserted category to change his type to list of category
            $menuItem=$category->parent()->get()->first()->menuItem()->first();
            $menu=new Menu();
            if($menuItem){
                if ($menuItem->type=="category"){
                    $menuItem->type="list of categories";
                    $menuItem->save();
                }
                $menu->parent_id=$menuItem->id;
            }
            //son of the list of categories
//            $menu->name=$category->name;
            $menu->type="category";
            $category->save();
            $menu->cat_id=$category->id;
            $menu->save();
            foreach($languages as $language) {
                $temp="name_".$language->name;
                $menu_languages []=[
                    'name'=> $request->$temp,
                    'menu_id'=>$menu->id,
                    'language_id'=>$language['id'],
                ];

            }
            Menus_language::insert($menu_languages );

        }else{
            $category->save();
        }

        foreach($languages as $language) {
            $temp="name_".$language->name;
            $tempDescption="description_".$language->name;
            $category_languages []=[
                'name'=> $request->$temp,
                'description'=>$request->$tempDescption,
                'categorie_id'=>$category->id,
                'language_id'=>$language['id'],
            ];
            $tempMetaTitle ="metaTitle_".$language->name;
            $tempMetaContent="metaContent_".$language->name;
            $tempKeywords="keywords_".$language->name;

            if($request->has($tempMetaTitle) || $request->has($tempMetaContent) || $request->has($tempKeywords)) {
                $cats_meta [] = [
                    'title' => $request->$tempMetaTitle,
                    'content' => $request->$tempMetaContent,
                    'keywords' => $request->$tempKeywords,
                    'cat_id' => $category->id,
                    'language_id' => $language['id'],
                ];

            }
        }
        Categories_language::insert($category_languages);
        Categories_meta::insert($cats_meta);
        return back();

    }
    public function  delete(Categorie $category){
        DB::beginTransaction();
        if (!$category->delete()){
            DB::rollBack();
        }
        DB::commit();
        return redirect("category");
    }

    public function  update(Categorie $category){
        $categories = Categorie::all();
        $languages =Language::all();
        $Categories_languages=Categories_language::all();
        $Categories_metas=Categories_meta::all();
        return view("Category.update",compact('category','categories','languages','Categories_languages','Categories_metas'));
    }
    public function save(Request $request,Categorie $category)
    {
        if ($request->parent_id){
            $category->parent_id = $request->parent_id;
        }
        $category->save();
//        $category->update($request->all());
        foreach($category->Categories_languages as $lang) {
            $temp="name_".$lang->name;
            $tempDesc="description_".$lang->name;
            DB::table('categories_languages')->where([['categorie_id',$category->id],['language_id',$lang->pivot->language_id]])->update(['name'=> $request->get($temp),'description'=> $request->get($tempDesc)]);
        }

        foreach($category->Categories_metas as $meta) {

            DB::table('categories_metas')->where([['cat_id',$category->id],['language_id',$meta->language_id]])->update(['title'=> $request->get('metaTitle'),'content'=> $request->get('metaContent'),'keywords'=> $request->get('keywords')]);
        }

        return redirect(url("/category"));
    }
}

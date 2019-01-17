<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Fieldvalue;
use App\Fieldvalues_language;
use App\Item;
use App\Items_language;
use App\Items_meta;
use App\Menu;
use App\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class ItemController extends Controller
{
    public function index(Categorie $category)
    {
        $menus=Menu::all();
        $languages =Language::all();
        $items=Item::all();
        $categories=Categorie::all();
        $items_meta=Items_meta::all();
        return view("Items.newItem",compact("menus","category","categories","items","languages","items_meta"));

    }
    //

    public function add(Request $request,Categorie $category)
    {
        $item = new Item();
        $languages = Language::all();
        $destination = 'uploads/photos/'; // your upload folder


//        $image       = $request->file('itemImage');
//        $filename    = uniqid('img_', true);//$image->getClientOriginalName(); // get the filename
//        $fileExt=$image->getClientOriginalExtension();
//        $image->move($destination, $filename.".".$fileExt); // move file to destination
//
//        //  $item->name = $request->name;
//        //  $item->title= $request->title;
//        //   $item->content= $request->pageContent;
//     //   $item->description=$request->description;
//        $item->image=$filename.".".$fileExt;
        $item->cat_id = $category->id;
        /*if($request->cat_id){
            $item->cat_id=$request->cat_id;
        }
        else {
            $item->cat_id = $category->id;
        }*/

        $item->save();
        $fieldvalues_languages []=[];
        foreach ($category->fields as $field){
            $fieldValue= new Fieldvalue();
            $fieldValue->field_id=$field->id;
            $fieldValue->value="";
            $fieldValue->item_id=$item->id;
            $fieldValue->save();

        foreach ($languages as $language) {

            /*$fieldvalues_languages [] = [
                'value' => $fieldValue->value,
                'fieldvalue_id' => $fieldValue->id,
                'language_id' => $language['id'],
            ];*/
            $fvl=new Fieldvalues_language();
            $fvl->value=$fieldValue->value;
            $fvl->fieldvalue_id=$fieldValue->id;
            $fvl->language_id=$language['id'];
            $fvl->save();
        }
        }
        //Fieldvalues_language::insert($fieldvalues_languages);

        foreach ($languages as $language) {
         // if ($language->id == session("lang")) {
            $tempMetaTitle ="metaTitle_".$language->name;
            $tempMetaContent="metaContent_".$language->name;
            $tempKeywords="keywords_".$language->name;

            $tempimageTitle ="imageTitle_".$language->name;
            $tempimageAlt="imageAlt_".$language->name;

            $temp = "name_" . $language->name;
            $tempTitle = "title_" . $language->name;
            $tempItemImage = "itemImage_" . $language->name;
            $tempContent = "pageContent_" . $language->name;
            $tempDescption = "description_" . $language->name;
            if($request->has($temp)) {
                $image = $request->file($tempItemImage);
                $filename = uniqid('img_', true);//$image->getClientOriginalName(); // get the filename
             //   var_dump($request->all());
               // die();
                $fileExt = $image->getClientOriginalExtension();
                $image->move($destination, $filename . "." . $fileExt); // move file to destination

                $items_languages [] = [
                    'name' => $request->$temp,
                    'description' => $request->$tempDescption,
                    'title' => $request->$tempTitle,
                    'content' => $request->$tempContent,
                    'image' => $filename . "." . $fileExt,
                    'image_title' => $request->$tempimageTitle,
                    'image_alt' => $request->$tempimageAlt,
                    'item_id' => $item->id,
                    'language_id' => $language['id'],
                ];
                Items_language::insert($items_languages);

                if($request->has($tempMetaTitle) || $request->has($tempMetaContent) || $request->has($tempKeywords)) {
                    $items_meta [] = [
                        'title' => $request->$tempMetaTitle,
                        'content' => $request->$tempMetaContent,
                        'keywords' => $request->$tempKeywords,
                        'item_id' => $item->id,
                        'language_id' => $language['id'],
                    ];
                    Items_meta::insert($items_meta);
                }
            }
//            var_dump($image->getClientOriginalExtension());
//            die();
        }
        $cat = $item->category()->get()->first();
        if($cat->menuItem()){

            if($item->category()->get()->first()->menuItem()->get()->first()) {
                if ($item->category()->get()->first()->menuItem()->get()->first()->type == "item per page"
                    || $item->category()->get()->first()->menuItem()->get()->first()->type == "form per page") {
                    return redirect("category");
                }
            }
        }
        //custom field:
        foreach($item->category->fields as $field){
            $fieldValue=new Fieldvalue();
            $fieldValue->value="0";//$request->get("custom_$field->name");
            $fieldValue->item_id=$item->id;
            $fieldValue->field_id=$field->id;
            $fieldValue->save();
    }
        return redirect("showCategory/".$item->cat_id);
    }

    public function update(Request $request,Item $item)
    {
        $item->update($request->all());

        foreach($item->Items_metas as $langMeta) {


            DB::table('items_metas')->where('item_id', $langMeta->item_id)->update(['title' => $request->get('metaTitle'), 'keywords' => $request->get('keywords'), 'content' => $request->get('metaContent')]);

        }
        //$item->description=$request->description;
        foreach($item->Items_languages as $lang) {
           if($lang->pivot->language_id == session("lang")) {

               DB::table('items_languages')->where('item_id', $lang->pivot->item_id)->where("language_id", $lang->pivot->language_id)->update(['name' => $request->get('name'), 'description' => $request->get('description'), 'title' => $request->get('title'), 'content' => $request->get('content'), 'image_title' => $request->get('imageTitle'), 'image_alt' => $request->get('imageAlt')]);
           }
            }
        $item->save();

        $cat = $item->category()->get()->first();
        if($cat->menuItem()->get()->first()) {
            if ($item->category()->get()->first()->menuItem()->get()->first()->type == "item per page") {
                return redirect("category");
            }
        }
        return redirect("showCategory/".$item->cat_id);

    }
    public function show(Categorie $category, Item $item)
    {   $languages=Language::all();
        $menus=Menu::all();
        $categories=Categorie::all();
        $topItems= null;
        $items=$category->items()->get();
        if ($items){
            $topItems=$items->first()->orderBy("created_at",true)->get()->take(5);
        }
//        foreach ($items as $item ){
//
//            var_dump($item);
//            var_dump("------------------------------");
//        }
//        die();

        $meta= $item->Items_metas()->get();
        return view("Items.show",compact("menus","category","item","categories","topItems","languages","meta"));
    }

    public function  delete(Item $item){
        $cat_id =$item->cat_id;
        $item->Items_languages()->detach();
        $item->Items_metas()->delete();
        $item->delete();
        return redirect("showCategory/".$cat_id);
    }

}

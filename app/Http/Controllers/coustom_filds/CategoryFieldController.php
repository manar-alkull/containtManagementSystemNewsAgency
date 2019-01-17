<?php

namespace App\Http\Controllers\coustom_filds;

use App\Categorie;
use App\Customs_language;
use App\Fieldvalue;
use Illuminate\Http\Request;
use App\Custom_field;
use App\Fieldvalues_language;
use App\Http\Requests;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryFieldController extends Controller
{
    function index(Request $request, $categoryId){
        $languages =Language::all();
        return view('customField.addFieldCat',compact("categoryId","languages"));
    }
    function insert(Request $request,Categorie $category){
        $languages = Language::all();

        $customField=new custom_field($request->all());
        $customField->category_id=$category->id;
        $customField->save();

        foreach ($languages as $language) {
            $temp = "name_" . $language->name;
            $customs_languages [] = [
                'name' => $request->$temp,
                'custom_field_id' => $customField->id,
                'language_id' => $language['id'],
            ];
        }
        Customs_language::insert($customs_languages);

        foreach ($category->items as $item){
            $fieldValue=new Fieldvalue();
            $fieldValue->value="";
            $fieldValue->field_id=$customField->id;
            $fieldValue->item_id=$item->id;
            $fieldValue->save();

            foreach ($languages as $language) {

                $fieldvalues_languages [] = [
                        'value' => "",
                    'fieldvalue_id' => $fieldValue->id,
                    'language_id' => $language['id'],
                ];
            }
        }
        Fieldvalues_language::insert($fieldvalues_languages);

        return redirect("showCategory/".$category->id);
    }
    function update(Request $request,Custom_field $custom_field){
        $custom_field->update($request->all());
        foreach($custom_field->Customs_languages as $custolang) {
            if ($custolang->pivot->language_id == session("lang")){

                DB::table('customs_languages')->where('custom_field_id', $custolang->pivot->custom_field_id)->where('language_id', $custolang->pivot->language_id)->update(['name' => $request->get('name')]);
            }
        }
        $custom_field->save();
        $catId=$custom_field->category->id;
        return redirect("showCategory/".$catId);
    }
    function showUpdate(Custom_field $custom_field){
        $languages =Language::all();
        return  view('customField.updateFieldCat',compact("custom_field","languages"));//->with("custom_field",$custom_field)->with("fieldvalue",$fieldvalue);//,["custom_field"=>$custom_field,"fieldvalue"=>$fieldvalue]);
    }

    function show(Custom_field $custom_field){
        $languages =Language::all();
        return  view('customField.showFieldCat',compact("custom_field","languages"));//->with("custom_field",$custom_field)->with("fieldvalue",$fieldvalue);//,["custom_field"=>$custom_field,"fieldvalue"=>$fieldvalue]);
    }
    function delete(Custom_field $custom_field){
        $custom_field->delete();
        return back();
    }

}

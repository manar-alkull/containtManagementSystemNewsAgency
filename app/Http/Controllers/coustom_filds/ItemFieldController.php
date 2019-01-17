<?php

namespace App\Http\Controllers\coustom_filds;




use App\custom_field;
//use App\custom_Field_Handler3\FieldForItem;
use App\Fieldvalue;
use App\Fieldvalues_language;
use App\Item;
use App\language;
use App\Customs_language;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemFieldController extends Controller
{
    function index(Request $request, Item $item){
        //$request->session()->put("item",1);
        //session(['item' => 1]);
        $languages =Language::all();
        return view('customField.addField',compact("item","languages"));
    }
    function insert(Request $request, Item $item){
        //$itemId= $request->session()->get("item");
        //$itemId=session('item');
        $languages = Language::all();
        $itemId=$item->id;

        $customField=new custom_field($request->all());
        $fieldValue=new fieldvalue($request->all());
        $fieldValue->item_id=$itemId;
        $customField->save();
        $fieldValue->field_id=$customField->id;
        $fieldValue->save();
        foreach ($languages as $language) {
            $temp = "name_" . $language->name;
            $customs_languages [] = [
                'name' => $request->$temp,
                'custom_field_id' => $customField->id,
                'language_id' => $language['id'],
            ];
            $tempVlaue = "value_" . $language->name;
            $fieldvalues_languages [] = [
                'value' => $request->$tempVlaue,
                'fieldvalue_id' => $fieldValue->id,
                'language_id' => $language['id'],
            ];
        }
        Customs_language::insert($customs_languages);
        Fieldvalues_language::insert($fieldvalues_languages);
        $catId=$item->category->id;
        return redirect('frameField/addItem/'.$itemId);
    }
    function update(Request $request,fieldvalue $fieldvalue){
        $custom_field=$fieldvalue->field;
        if($custom_field->category_id==null){
        $custom_field->update($request->all());

        foreach($custom_field->Customs_languages as $custolang) {
            if ($custolang->pivot->language_id == session("lang")){

                DB::table('customs_languages')->where('custom_field_id', $custolang->pivot->custom_field_id)->where("language_id", $custolang->pivot->language_id)->update(['name' => $request->get('name')]);
        }
        }}

        $fieldvalue->update($request->all());
        foreach($fieldvalue->Fieldvalue_languages as $lang) {
            if ($lang->pivot->language_id == session("lang")) {

                DB::table('fieldvalues_languages')->where('fieldvalue_id', $lang->pivot->fieldvalue_id)->where("language_id", $lang->pivot->language_id)->update(['value' => $request->get('value')]);
            }
        }
        $custom_field->save();
        $fieldvalue->save();

        $itemId=$fieldvalue->item_id;
        $catId=$fieldvalue->item->category->id;
        return redirect('frameField/addItem/'.$itemId);
        //return view('customField.addField',$custom_field,$fieldvalue);
    }
    function showUpdate(Fieldvalue $fieldvalue){
        $custom_field=$fieldvalue->field;
        return  view('customField.updateField',compact("custom_field","fieldvalue"));//->with("custom_field",$custom_field)->with("fieldvalue",$fieldvalue);//,["custom_field"=>$custom_field,"fieldvalue"=>$fieldvalue]);
    }
    function delete(Fieldvalue $fieldvalue){
        $field=$fieldvalue->field;
        $fieldvalue->delete();
        if($field->category_id==null)
            $field->delete();
        return back();
    }
    function frameAddItem(Item $item){
        return view("customField.frameForAddItem",compact("item"));
    }

}

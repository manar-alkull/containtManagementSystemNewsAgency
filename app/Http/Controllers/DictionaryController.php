<?php

namespace App\Http\Controllers;

use App\Dictionary;
use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;
use App\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DictionaryController extends Controller
{

    public function index()
    {
        $dictionarys = Dictionary::all();
        $languages=Language::all();
        return view('Dictionary.dictionary',compact("dictionarys","languages"));
    }
    public function  update(Dictionary $dictionary){
        $languages =Language::all();
//        $i=1;
//        foreach ($languages as $lang){
//        $lable[]=[
//            'field'.$i=>$lang->name,
//        ];
//        $i=$i+1;
//        }
//        $dictionary->fill($lable);
      //  var_dump($dictionary->getFillable());die();
        return view("Dictionary.update",compact('dictionary','languages'));
    }

    public function save(Request $request,Dictionary $dictionary){

       $dictionary->update($request->all());
       // var_dump($request->get('name'));die();
      //  DB::table('dictionarys')->where('id',$dictionary->id)->update( ['name'=> $request->get($temp)]);
        return redirect(url("/dictionary"));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $fillable =['parent_id','type','position','name','cat_id'];
    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }


    //
    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id','id');
    }

    public function category()
    {
        return $this->hasOne('App\Categorie', 'id','cat_id');
    }
    //
    public function Menus_languages()
    {
        return $this->belongsToMany("App\Language",'menus_languages')->withPivot("name");
    }
    protected static function boot() {
        parent::boot();

        static::deleting(function($menu) { // before delete() method call this
            if ($menu->type == "category"){
                if (!$menu->category()->delete()) {
                    DB::rollBack();
                }
            }if ($menu->type == "item per page"){
                if (!$menu->category()->delete()) {
                    DB::rollBack();
                }
            }else{
                $children=$menu->children()->get();
                foreach ($children as $child){
                    if ($child->type == "category"){
                        if (!$child->category()->delete()) {
                            DB::rollBack();
                        }
                    }else{
                        $sonsOfChildren=$child->children()->get();
                        foreach ($sonsOfChildren as $son){
                            if ($son->type == "category"){
                                if (!$son->category()->delete()) {
                                    DB::rollBack();
                                }
                            }else{
                                $grandSons=$son->children()->get();
                                foreach ($grandSons as $grandSon){
                                    if ($grandSon->type == "category"){
                                        if (!$grandSon->category()->delete()) {
                                            DB::rollBack();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            // do the rest of the cleanup...
        });
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    protected $fillable = ['name','parent_id','description'];
    public function parent()
    {
        return $this->belongsTo('App\Categorie', 'parent_id');
    }

    //
    public function children()
    {
        return $this->hasMany('App\Categorie', 'parent_id','id');
    }

    //
    public function items(){

        return $this->hasMany("App\Item","cat_id","id");
    }

    /*public function item()
    {
        return $this->hasOne('App\Item', 'cat_id','id');
    }*/
    public function menuItem()
    {
        return $this->hasOne('App\Menu', 'cat_id','id');
    }

    public function Categories_languages()
    {
        return $this->belongsToMany("App\Language",'categories_languages')->withPivot("name","description");
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this

            if (!$category->Categories_languages()->detach()){
                DB::rollBack();
            }
            if (!$category->items()->delete()) {
                DB::rollBack();
            }
            // do the rest of the cleanup...
        });
    }


    public function Categories_metas(){

        return $this->hasMany("App\Categories_meta","cat_id","id");
    }

    public function fields(){

        return $this->hasMany('App\Custom_field',"category_id","id");
    }

    public function pagetemplate()
    {
        return $this->belongsTo('App\PageTemplate','template_id');
    }
}


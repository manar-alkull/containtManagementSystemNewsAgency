<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable =['content','title','image_title','image_alt','image','name','cat_id'];
    //
    public function category()
    {
        return $this->hasOne('App\Categorie', 'id','cat_id');
    }
    //
    public function Items_languages()
    {
        return $this->belongsToMany("App\Language",'items_languages')->withPivot("name","description","content","title","image",'image_title','image_alt');
    }

    public function Items_metas(){

        return $this->hasMany("App\Items_meta","item_id","id");
    }
    public function fieldValues(){

        return $this->hasMany("App\\Fieldvalue","item_id","id");
    }
}

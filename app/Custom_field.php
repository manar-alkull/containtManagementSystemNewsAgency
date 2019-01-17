<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom_field extends Model
{
    protected $fillable =['name','type',' category_id'];
    public $timestamps = false;
    public $updated_at = false;

    public function category()
    {
        return $this->hasOne('App\\Categorie', 'id','category_id');
    }
    public function Customs_languages()
    {
        return $this->belongsToMany("App\Language",'customs_languages')->withPivot("name");
    }
}

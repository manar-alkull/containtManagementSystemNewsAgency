<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories_meta extends Model
{
    protected $fillable = ['cat_id','language_id','title','content','keywords'];

    public function categories()
    {
        return $this->belongsTo('App\Categorie', 'cat_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

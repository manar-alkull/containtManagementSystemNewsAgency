<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories_language extends Model
{
    protected $fillable = ['name','description','categorie_id','language_id'];

    public function categories()
    {
        return $this->belongsTo('App\Categorie', 'categorie_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model
{
    protected $table = "template";
    protected $fillable = ['name'];

    public function categories()
    {
        return $this->hasMany('App\Categorie', 'template_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus_language extends Model
{
    protected $fillable = ['name','menu_id','language_id'];

    public function menus()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

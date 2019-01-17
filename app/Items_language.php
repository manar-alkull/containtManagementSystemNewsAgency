<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_language extends Model
{
    protected $fillable = ['name','title','content','description','image','item_id','language_id'];
    public function items()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

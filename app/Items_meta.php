<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_meta extends Model
{
    protected $fillable = ['item_id','language_id','title','content','keywords'];
    public function items()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

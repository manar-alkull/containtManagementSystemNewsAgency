<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customs_language extends Model
{
    protected $fillable = ['name','custom_id','language_id'];
    public function customs()
    {
        return $this->belongsTo('App\Custom_field', 'custom_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

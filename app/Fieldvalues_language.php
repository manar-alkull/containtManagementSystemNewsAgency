<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fieldvalues_language extends Model
{
    public $timestamps = false;
    public $updated_at = false;

    protected $fillable = ['value','fieldvalue_id','language_id'];
    public function customs()
    {
        return $this->belongsTo('App\Fieldvalue', 'fieldvalue_id');
    }
    public function languages()
    {
        return $this->belongsTo('App\language', 'language_id');
    }
}

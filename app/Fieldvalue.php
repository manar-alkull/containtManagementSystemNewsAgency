<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fieldvalue extends Model
{
    protected $fillable =['value','field_id',' item_id'];
    public $timestamps = false;
    public $updated_at = false;

    public function field()
    {
        return $this->hasOne('App\custom_field', 'id','field_id');
    }

    public function item()
    {
        return $this->hasOne('App\item', 'id','item_id');
    }
    public function Fieldvalue_languages()
    {
        return $this->belongsToMany("App\Language",'fieldvalues_languages')->withPivot("value");
    }
}

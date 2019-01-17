<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];

    public function Items_languages()
    {
        return $this->hasMany(Items_language::class);
    }
    public function Categories_languages()
    {
        return $this->hasMany(Categories_language::class);
    }
    public function Menus_languages()
    {
        return $this->hasMany(Menus_language::class);
    }

    public function Items_metas()
    {
        return $this->hasMany(Items_meta::class);
    }
    public function Customs_languages()
    {
        return $this->hasMany(Customs_language::class);
    }
    public function Fieldvalue_languages()
    {
        return $this->hasMany( Fieldvalues_language::class);
    }
}

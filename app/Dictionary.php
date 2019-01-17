<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = ['English','Arabic','French'];
    protected $table ='dictionarys';
}

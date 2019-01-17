<?php
/**
 * Created by PhpStorm.
 * User: MANAR
 * Date: 24/11/2017
 * Time: 05:44 م
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
abstract class Field extends Model
{
    public $timestamps = false;
    public $updated_at = false;

    function toString():string {
        return $this->name." : ".$this->value;
    }
}

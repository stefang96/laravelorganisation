<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='country';
    protected $primaryKey='idcountry';


    public function allCountry()
    {
        return $this->all();
    }
}

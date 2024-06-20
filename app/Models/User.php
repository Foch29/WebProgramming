<?php

namespace App\Models;                           //QUESTA Ë UNA ENTITÄ ORM


use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public function collections()
    {
        return $this->hasMany('App\Models\Collection'); //relazione 1 a N 
    }
}

<?php

namespace App\Models;                           //QUESTA Ë UNA ENTITÄ ORM


use Illuminate\Database\Eloquent\Model;


class Capital extends Model
{
    protected $autoincrement = false; //la tabella usa come id i nomi delle cittá->non serve autoincrement e sará string
    protected $keyType = "string";
    
    public $timestamps = false; //non c'e' bisogno dei timestamps
}

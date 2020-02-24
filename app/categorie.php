<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
     //jika nama tabel tidak jamak (tidak berakhiran dengan S)
    protected $table = "categories";
}

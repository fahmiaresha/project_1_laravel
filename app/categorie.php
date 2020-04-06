<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
     //jika nama tabel tidak jamak (tidak berakhiran dengan S)
    protected $table = "categories";
    protected $primaryKey = 'category_id';
    //yang dapat di insert 
   protected $fillable = ['category_name'];
   public $timestamps= false;
}

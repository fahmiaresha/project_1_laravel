<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
     //jika nama tabel tidak jamak (tidak berakhiran dengan S)
     protected $table = "product";
     protected $primaryKey = 'product_id';
     //yang dapat di insert 
    protected $fillable = ['category_id','product_name','product_price','product_stok','explanation'];
    //agar tidak ada kolom created at & updated add
    public $timestamps= false;

}

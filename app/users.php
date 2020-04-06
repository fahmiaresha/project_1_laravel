<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
     
     protected $table = "user";
     protected $primaryKey = 'user_id';
     protected $fillable = ['first_name','last_name','email','phone','password','job_status'];
     public $timestamps= false;
     protected $hidden = [ 'password' ];
}

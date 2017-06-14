<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='members';

    protected $fillable = ['name','age','address'];

    protected $guarded = ['id','created_at','updated_at'];

    public $timestamps = true;
    
}

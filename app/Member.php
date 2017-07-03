<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='members';

    protected $fillable = ['name','age','address'];

    protected $guarded = ['id'];

    public $timestamps = true;
}

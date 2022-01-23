<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    protected $fillable = ['username','address','phonenumber','email','status'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

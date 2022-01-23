<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    protected $fillable = ['file','title','description'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

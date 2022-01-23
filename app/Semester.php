<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    protected $fillable = ['semname','depname'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

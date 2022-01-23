<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBook extends Model
{
    use HasFactory;

    protected $fillable = ['bookname','authorname','depname','semname','coursecode','bookpdf','bookpic','reqby'];
}

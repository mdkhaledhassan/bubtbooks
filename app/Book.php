<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $fillable = ['bookname','authorname','depname','semname','coursecode','buyingprice','sellingprice','totalquantity','bookpdf','bookpic','view_count','admin'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellBook extends Model
{
    use HasFactory;
    protected $fillable = ['name','bubtid','email','phonenumber','bookname','authorname','depname','semname','coursecode','booktype','status','bookpic','price','description'];
}

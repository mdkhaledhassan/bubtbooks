<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderBook extends Model
{
    
	protected $fillable = ['userid','bookid','orderid','paymentid','bookname','quantity','bookprice','total'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}

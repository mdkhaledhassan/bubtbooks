<?php

use Illuminate\Support\Facades\Route;

/*
 --------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Auth::routes();
//Admin
Route::get('/admin', function () {
    return view('admin');
})->middleware('isadmin');
//User
Route::get('/user', function () {
    return view('user');
})->middleware('auth');

//guest
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/guide', function () {
    return view('guide');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/policy', function () {
    return view('policy');
});

//User Saction

Route::get('/update', [
"uses"=>"PageController@show"
])->name('update')->middleware('auth');

Route::post('/update', [
"uses"=>"PageController@update"
])->name('update')->middleware('auth');

Route::get('/changepassword', [
"uses"=>"PageController@showpassword"
])->name('changepassword')->middleware('auth');

Route::post('/changepassword', [
"uses"=>"PageController@changepassword"
])->name('changepassword')->middleware('auth');


//Admin Saction
//User Views
Route::get('/viewusers', [
"uses"=>"PageController@viewusers"
])->middleware('isadmin');

Route::post('/viewusers', [
"uses"=>"PageController@adduser"
])->middleware('isadmin');

Route::post('/deleteuser/{id}', [
        'uses' => 'PageController@deleteuser',
        'as' => 'deleteuser'
    ])->middleware('isadmin');

Route::post('/updateuser/{id}', [
        'uses' => 'PageController@updateuser',
        'as' => 'updateuser'
    ])->middleware('isadmin');

//Book Views

Route::get('/viewbooks', [
"uses"=>"PageController@viewbooks"
])->middleware('isadmin');

Route::post('/viewbooks', [
"uses"=>"PageController@addbook"
])->middleware('isadmin');

Route::post('/deletebook/{id}', [
        'uses' => 'PageController@deletebook',
        'as' => 'deletebook'
    ])->middleware('isadmin');

Route::post('/updatebook/{id}', [
        'uses' => 'PageController@updatebook',
        'as' => 'updatebook'
    ])->middleware('isadmin');

Route::get('/admin','PageController@counts')->middleware('isadmin');

//Admin Views

Route::get('/viewadmins', [
"uses"=>"PageController@viewadmins"
])->middleware('isadmin');

Route::post('/viewadmins', [
"uses"=>"PageController@addadmin"
])->middleware('isadmin');

Route::post('/deleteadmin/{id}', [
        'uses' => 'PageController@deleteadmin',
        'as' => 'deleteadmin'
    ])->middleware('isadmin');

Route::post('/updateadmin/{id}', [
        'uses' => 'PageController@updateadmin',
        'as' => 'updateadmin'
    ])->middleware('isadmin');

//Admin Register

//Route::get('/adminregister', function () {
   // return view('adminregister');
//});

//Route::post('/adminregister', [
//"uses"=>"PageController@regadmin"
//]);

//Department

Route::get('/departments', [
"uses"=>"PageController@viewdepartments"
])->middleware('isadmin');

Route::post('/departments', [
"uses"=>"PageController@adddepartment"
])->middleware('isadmin');

Route::post('/deletedepartment/{id}', [
        'uses' => 'PageController@deletedepartment',
        'as' => 'deletedepartment'
    ])->middleware('isadmin');

Route::post('/updatedepartment/{id}', [
        'uses' => 'PageController@updatedepartment',
        'as' => 'updatedepartment'
    ])->middleware('isadmin');


//Semester


Route::get('/semesters', [
"uses"=>"PageController@viewsemesters"
])->middleware('isadmin');

Route::post('/semesters', [
"uses"=>"PageController@addsemester"
])->middleware('isadmin');

Route::post('/deletesemester/{id}', [
        'uses' => 'PageController@deletesemester',
        'as' => 'deletesemester'
    ])->middleware('isadmin');

Route::post('/updatesemester/{id}', [
        'uses' => 'PageController@updatesemester',
        'as' => 'updatesemester'
    ])->middleware('isadmin');


Route::get('/viewbooks/{depname}', [
"uses"=>"PageController@findsemesters"
])->middleware('isadmin');

//Route::get('viewbooks/{depname}','PageController@findsemesters');

//book
Route::get('/trashbox', [
"uses"=>"PageController@viewalltrash"
])->middleware('isadmin');

Route::post('/bookkill/{id}', [
        'uses' => 'PageController@bookkill',
        'as' => 'bookkill'
    ])->middleware('isadmin');

Route::post('/bookrestore/{id}', [
        'uses' => 'PageController@bookrestore',
        'as' => 'bookrestore'
    ])->middleware('isadmin');

//Department

Route::post('/depkill/{id}', [
        'uses' => 'PageController@depkill',
        'as' => 'depkill'
    ])->middleware('isadmin');

Route::post('/deprestore/{id}', [
        'uses' => 'PageController@deprestore',
        'as' => 'deprestore'
    ])->middleware('isadmin');

//Semester

Route::post('/semkill/{id}', [
        'uses' => 'PageController@semkill',
        'as' => 'semkill'
    ])->middleware('isadmin');

Route::post('/semrestore/{id}', [
        'uses' => 'PageController@semrestore',
        'as' => 'semrestore'
    ])->middleware('isadmin');


//User

Route::post('/userkill/{id}', [
        'uses' => 'PageController@userkill',
        'as' => 'userkill'
    ])->middleware('isadmin');

Route::post('/userrestore/{id}', [
        'uses' => 'PageController@userrestore',
        'as' => 'userrestore'
    ])->middleware('isadmin');

//Admin

Route::post('/adminkill/{id}', [
        'uses' => 'PageController@adminkill',
        'as' => 'adminkill'
    ])->middleware('isadmin');

Route::post('/adminrestore/{id}', [
        'uses' => 'PageController@adminrestore',
        'as' => 'adminrestore'
    ])->middleware('isadmin');


//admin roles

Route::get('/roles', [
"uses"=>"PageController@viewroles"
])->middleware('isadmin');


Route::get('/makeadmin/{id}', [
        'uses' => 'PageController@makeadmin',
        'as' => 'makeadmin'
    ])->middleware('isadmin');

    Route::get('/removeadmin/{id}', [
        'uses' => 'PageController@removeadmin',
        'as' => 'removeadmin'
    ])->middleware('isadmin');

//readbook
Route::get('/bookdownload/{bookpdf}', [
        'uses' => 'PageController@bookdownload',
    ])->middleware('auth');


Route::get('/download/{id}', [
        'uses' => 'PageController@downloadbook',
    ])->middleware('auth');

Route::get('/readbook/{id}', [
        'uses' => 'PageController@readbook',
        'as' => 'readbook'
    ])->middleware('auth');

Route::get('/books/{depname}/{semname}/{bookname}', [
"uses"=>"PageController@showbooks"
]);


//index departments


Route::get('/', [
"uses"=>"PageController@indexdepartments"
]);



Route::get('/books/{depname}', [
        'uses' => 'PageController@showsemesters',
        'as' => 'show'
    ]);


Route::get('/books/{depname}/{semname}', [
        'uses' => 'PageController@showsemestersbooks',
    ]);



Route::get('/loading', function () {
    return view('loading');
});

//cart

Route::get('/cart', [
    'uses' => 'PageController@cart',
    'as' => 'cart'
])->middleware('auth');

Route::get('/cart/delete/{id}', [
    'uses' => 'PageController@deletetocart',
    'as' => 'cartdelete'
])->middleware('auth');

Route::get('cart/incr/{id}', [
    'uses' => 'PageController@incr',
    'as' => 'cartincr'
])->middleware('auth');

Route::get('cart/decr/{id}', [
    'uses' => 'PageController@decr',
    'as' => 'cartdecr'
])->middleware('auth');

Route::get('/cart/add', [
    'uses' => 'PageController@addtocart',
    'as' => 'cartadd'
])->middleware('auth');


//search


Route::get('/search', [
        'uses' => 'PageController@search',
        'as' => 'search'
    ]);


//checkout
Route::get('/shippinginfo', [
    'uses' => 'PageController@viewshippinginfo',
])->middleware('auth');

Route::get('/payment', [
    'uses' => 'PageController@viewpayment',
])->middleware('auth');

Route::get('/orderreview', [
    'uses' => 'PageController@vieworderreview',
])->middleware('auth');

Route::post('/payment', [
    'uses' => 'PageController@shippinginfo',
    'as' => 'shippinginfo'
])->middleware('auth');

Route::post('/backshippinginfo', [
    'uses' => 'PageController@backshippinginfo',
    'as' => 'backshippinginfo'
])->middleware('auth');

Route::post('/backpayment', [
    'uses' => 'PageController@backpayment',
    'as' => 'backpayment'
])->middleware('auth');

Route::post('/orderreview', [
    'uses' => 'PageController@payment',
    'as' => 'payment'
])->middleware('auth');

Route::post('/thankyou', [
    'uses' => 'PageController@checkout',
    'as' => 'orderreview'
])->middleware('auth');



Route::get('/thankyou', function () {
    return view('thankyou');
})->middleware('auth');


//orders

Route::get('/vieworders', [
"uses"=>"PageController@vieworders"
])->middleware('isadmin');


Route::get('/vieworderpayment/{id}', [
"uses"=>"PageController@vieworderpayment"
])->middleware('isadmin');


Route::post('/updatepayment/{id}', [
        'uses' => 'PageController@updatepayment',
        'as' => 'updatepayment'
    ])->middleware('isadmin');

Route::get('/orders', [
"uses"=>"PageController@orders"
])->middleware('auth');

Route::get('/orderbooks/{id}', [
"uses"=>"PageController@orderbooks"
])->middleware('auth');

Route::get('/vieworderbooks/{id}', [
"uses"=>"PageController@vieworderbooks"
])->middleware('isadmin');


Route::post('/updateorderstatus/{id}', [
        'uses' => 'PageController@updateorderstatus',
        'as' => 'updateorderstatus'
    ])->middleware('isadmin');

//live chat

Route::get('/userinbox', [
"uses"=>"PageController@viewactiveadmins"
])->middleware('auth');

Route::get('/admininbox', [
"uses"=>"PageController@viewactiveusers"
])->middleware('isadmin');


Route::get('/userchat/{id}', [
"uses"=>"PageController@viewuserchat"
])->middleware('auth');

Route::get('/adminchat/{senderid}', [
"uses"=>"PageController@viewadminchat"
])->middleware('isadmin');


Route::post('/userchat', [
"uses"=>"PageController@usermessage",
'as' => 'userchat'
])->middleware('auth');

Route::post('/adminchat', [
"uses"=>"PageController@adminmessage",
'as' => 'adminchat'
])->middleware('isadmin');


//notice board

Route::get('/viewnotice', [
"uses"=>"PageController@viewnotice"
])->middleware('isadmin');

Route::post('/viewnotice', [
"uses"=>"PageController@addnotice"
])->middleware('isadmin');

Route::post('/deletenotice/{id}', [
        'uses' => 'PageController@deletenotice',
        'as' => 'deletenotice'
    ])->middleware('isadmin');

Route::post('/updatenotice/{id}', [
        'uses' => 'PageController@updatenotice',
        'as' => 'updatenotice'
    ]);

Route::get('/viewupdate/{id}', [
"uses"=>"PageController@viewupdatenotice"
])->middleware('isadmin');


Route::post('/noticekill/{id}', [
        'uses' => 'PageController@noticekill',
        'as' => 'noticekill'
    ])->middleware('isadmin');

Route::post('/noticerestore/{id}', [
        'uses' => 'PageController@noticerestore',
        'as' => 'noticerestore'
    ])->middleware('isadmin');

Route::get('/notice/{id}', [
        'uses' => 'PageController@readnotice',
    ]);

Route::get('/updatebook/{id}', [
"uses"=>"PageController@viewupdatebook"
])->middleware('isadmin');

Route::get('updatebooks/{depname}','PageController@findsemesters');

Route::get('/notices', [
        'uses' => 'PageController@notices',
    ]);

Route::get('/settings', [
"uses"=>"PageController@viewsettings"
])->middleware('isadmin');

Route::post('/settings', [
"uses"=>"PageController@updatesettings"
])->name('updatesettings')->middleware('isadmin');


Route::post('/contact/send', [
        'uses' => 'PageController@contact',
        'as' => 'contact'
    ]);




Route::get('/users/search', [
        'uses' => 'PageController@searchusers',
        'as' => 'searchusers'
    ])->middleware('isadmin');





Route::get('/book/search', [
        'uses' => 'PageController@searchbooks',
        'as' => 'searchbooks'
    ])->middleware('isadmin');



Route::get('/orders/search', [
        'uses' => 'PageController@searchorders',
        'as' => 'searchorders'
    ])->middleware('isadmin');

Route::get('/invoice/{id}', [
"uses"=>"PageController@pdf"
]);

//request book

Route::get('/requestbook', [
"uses"=>"PageController@viewrequestbook"
])->middleware('auth');

Route::post('/requestbook', [
"uses"=>"PageController@reqbook"
])->middleware('auth');

Route::get('/viewreqbook', [
"uses"=>"PageController@viewreqbook"
])->middleware('isadmin');

Route::post('/viewdeleterequest/{id}', [
        'uses' => 'PageController@viewdeleterequest',
        'as' => 'viewdeleterequest'
    ])->middleware('isadmin');

Route::post('/updaterequest/{id}', [
        'uses' => 'PageController@updaterequest',
        'as' => 'updaterequest'
    ])->middleware('auth');

Route::post('/deleterequest/{id}', [
        'uses' => 'PageController@deleterequest',
        'as' => 'deleterequest'
    ])->middleware('auth');

Route::post('/viewreqbook/{id}', [
        'uses' => 'PageController@updatereqstatus',
        'as' => 'updatereqstatus'
    ])->middleware('isadmin');

Route::get('/reqbooks', [
"uses"=>"PageController@viewreqbooks"
])->middleware('isadmin');


Route::post('/reqbooks', [
        'uses' => 'PageController@addreqbook',
    ])->middleware('isadmin');


Route::get('/updatereqbook/{id}', [
"uses"=>"PageController@viewupdatereqbook"
])->middleware('isadmin');

Route::post('/updatereqbook/{id}', [
        'uses' => 'PageController@updatereqbook',
        'as' => 'updatereqbook'
    ])->middleware('isadmin');


Route::get('/requests/books/{id}', [
"uses"=>"PageController@showreqbooks"
]);

Route::get('/requests/books/', [
"uses"=>"PageController@showallreqbooks"
]);

//sell book

Route::get('/sellbook', [
"uses"=>"PageController@viewsellbook"
])->middleware('auth');


Route::post('/sellbook', [
"uses"=>"PageController@sellbook"
])->middleware('auth');


Route::post('/updatesellstatus/{id}', [
        'uses' => 'PageController@updatesellstatus',
        'as' => 'updatesellstatus'
    ])->middleware('auth');

Route::post('/deletesellbook/{id}', [
        'uses' => 'PageController@deletesellbook',
        'as' => 'deletesellbook'
    ])->middleware('auth');

Route::get('/updatesellbook/{id}', [
"uses"=>"PageController@viewupdatesellbook"
])->middleware('auth');


Route::post('/updatesellbook/{id}', [
        'uses' => 'PageController@updatesellbook',
        'as' => 'updatesellbook'
    ])->middleware('isadmin');

//admin sell book

Route::get('/viewsellbook', [
"uses"=>"PageController@viewallsellbook"
])->middleware('isadmin');

Route::post('/viewdeletesellbook/{id}', [
        'uses' => 'PageController@viewdeletesellbook',
        'as' => 'viewdeletesellbook'
    ])->middleware('isadmin');


Route::post('/viewupdatesellstatus/{id}', [
        'uses' => 'PageController@viewupdatesellstatus',
        'as' => 'viewupdatesellstatus'
    ])->middleware('isadmin');

Route::get('/sell/books/', [
"uses"=>"PageController@showallsellbooks"
])->middleware('auth');

Route::get('/sell/books/{id}', [
"uses"=>"PageController@showsellbooks"
])->middleware('auth');



<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Department;
use App\Semester;
use App\Order;
use App\OrderBook;
use App\Payment;
use App\Chat;
use App\Notice;
use App\OrderDetails;
use App\Settings;
use App\RequestBook;
use App\Requests;
use App\SellBook;
use App\Mail\SendMail;
use PDF;
use Cart;
use Cache;
use Image;
use Session;
use Mail;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class PageController extends Controller
{

//simple user 
    public function show()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);

            if($user)
            {

                return view('update')->withUser($user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        
        }
    }

    public function showpassword()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);

            if($user)
            {

                return view('changepassword')->withUser($user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user)
        {
            $this->validate($request, [
            'name'    =>  'required',
            'gender'    =>  'required',
            'email'    =>  'required',
            'intake'    =>  'required',
            'section'    =>  'required',
            'phonenumber'     =>  'required|min:11',

        ]);

            if($request->hasfile('userpic'))
            {
                $file=$request->file('userpic');
                $extention= $file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                Image::make($file)->resize(300, 300)->save( public_path('/userpic/' . $filename ) );
                $user->userpic=$filename;
            }



            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->email = $request->input('email');
            $user->department = $request->input('department');
            $user->intake = $request->input('intake');
            $user->section = $request->input('section');
            $user->phonenumber = $request->input('phonenumber');


            $user->save();
            session()->flash('notif','Update Successfully');

            return redirect()->back();
            
        }
        else
        {
            return redirect()->back();
        }

    }

    public function changepassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user)
        {
            $this->validate($request, [
            'oldpassword'     =>  'required',
            'newpassword'     =>  'required|min:6',


        ]);

            $data = $request->all();

            $user = User::find(auth()->user()->id);
 
                if(!\Hash::check($data['oldpassword'], $user->password)){
             
                     session()->flash('notif','Old Password does not match.');
                     return redirect()->back();
             
                }else{
             
                   $user->password = bcrypt($request->input('newpassword'));


                    $user->save();

                    session()->flash('notif','Password Changed Successfully');
                    return redirect()->back();
             
                }

        }
        else
        {
            return redirect()->back();
        }

    }


//user


    public function viewusers()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin','0')->paginate(10);
        return view('viewusers', compact('allusers'));
    }


    public function adduser(Request $request)
    {
        $ob = new User;

        $this->validate($request, [
            
            'name' => ['required','max:255'],
            'gender' => ['required','max:255'],
            'bubtid' => ['required','min:11', 'max:20','unique:users'],
            'department' => ['required','max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'intake' => ['required','max:2'],
            'password' => ['required','min:6','confirmed'],
            'section' => ['required','max:2'],
            'phonenumber' => ['required','min:11', 'max:14'],

        ]);

        $ob->name=$request->name;
        $ob->gender=$request->gender;
        $ob->bubtid=$request->bubtid;
        $ob->department=$request->department;
        $ob->is_admin=0;
        $ob->email=$request->email;
        $ob->intake=$request->intake;
        $ob->password=bcrypt($request->password);
        $ob->section=$request->section;
        $ob->phonenumber=$request->phonenumber;
        $ob->save();
        
        $email_data = array(
            'name' => $request->name,
            'bubtid' => $request->bubtid,
            'email' => $request->email,
            'password' => $request->password,
        );



        Mail::send('welcome', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to BUBTBOOKS')
                ->from('admin@bubtbooks.com', 'BUBTBOOKS');
        });

        session()->flash('notif','User Added Successfully');

        return redirect()->back();
    }


    public function deleteuser(Request $request)
    {
        
        $ob = User::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','User Trash Successfully');

        return redirect()->back();

    }

   public function updateuser(Request $request)
    {

        $ob = User::findOrFail($request->id);

        $ob->update($request->all());
       
        session()->flash('notif','User Update Successfully');

        return redirect()->back();
    }


    public function userkill(Request $request)
    {
        $allusers = User::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','User Permanently Delete Successfully');

        return redirect()->back();
    }


    public function userrestore(Request $request)
    {
        $allusers = User::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','User Restore Successfully');

        return redirect()->back();
    }



//book


    public function addbook(Request $request)
    {
        $ob = new Book;


        $this->validate($request, [
            'bookname'    =>  'required',
            'authorname'    =>  'required',
            'depname'     =>  'required',
            'semname'     =>  'required',
            'coursecode'     =>  'required',
            'buyingprice'     =>  'required',
            'sellingprice'     =>  'required',
            'totalquantity'     =>  'required',
            'bookpic'     =>  'required',
            'bookpdf'     =>  'required',


        ]);

        $ob->bookname=$request->bookname;
        $ob->authorname=$request->authorname;
        $ob->depname=$request->depname;
        $ob->semname=$request->semname;
        $ob->coursecode=$request->coursecode;
        $ob->buyingprice=$request->buyingprice;
        $ob->sellingprice=$request->sellingprice;
        $ob->totalquantity=$request->totalquantity;
        $ob->admin=Auth::user()->name;

        if($request->hasfile('bookpic'))
        {
            $file1=$request->file('bookpic');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/bookpic/' . $filename1 ) );
            $ob->bookpic=$filename1;
        }


        if($request->hasfile('bookpdf'))
        {
            $file=$request->file('bookpdf');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('bookpdf/',$filename);
            $ob->bookpdf=$filename;
        }
        $ob->save();

        session()->flash('notif','Book Added Successfully');

        return redirect()->back();
    }

    public function viewbooks()
    {
        Paginator::useBootstrap();
        $allsemesters = Semester::get();
        $allbooks = Book::orderBy('id', 'desc')->paginate(10);
        $alldepartments = Department::get();

        return view('viewbooks', compact('alldepartments','allbooks','allsemesters'));
    }



    public function findsemesters($depname)
    {
        $semesters = Semester::where('depname',$depname)->get();
        return response()->json($semesters);
    }


    public function deletebook(Request $request)
    {
        
        $ob = Book::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Book Trash Successfully');

        return redirect()->back();

    }

   public function updatebook(Request $request, $id)
    {
        $ob = Book::find($id);
        $this->validate($request, [
            'bookname'    =>  'required',
            'authorname'    =>  'required',
            'coursecode'     =>  'required',
            'buyingprice'     =>  'required',
            'sellingprice'     =>  'required',
            'totalquantity'     =>  'required',

        ]);
            $ob->bookname = $request->input('bookname');
            $ob->authorname = $request->input('authorname');
            $ob->semname = $request->input('semname');
            $ob->depname = $request->input('depname');
            $ob->coursecode = $request->input('coursecode');
            $ob->buyingprice = $request->input('buyingprice');
            $ob->sellingprice = $request->input('sellingprice');
            $ob->totalquantity = $request->input('totalquantity');


        if($request->hasfile('bookpic'))
        {
            $file1=$request->file('bookpic');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/bookpic/' . $filename1 ) );
            $ob->bookpic=$filename1;
        }


        if($request->hasfile('bookpdf'))
        {
            $file=$request->file('bookpdf');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('bookpdf/',$filename);
            $ob->bookpdf=$filename;
        }



            $ob->save();

            session()->flash('notif','Book Update Successfully');

            return redirect()->back();
    }




    public function viewalltrash() 
    {
        Paginator::useBootstrap();
        $allbooks = Book::onlyTrashed()->paginate(10);
        $allsemesters = Semester::onlyTrashed()->paginate(10);
        $alldepartments = Department::onlyTrashed()->paginate(10);
        $alds = Department::get();
        $allusers = User::onlyTrashed()->where('is_admin','0')->paginate(10);
        $alladmins = User::onlyTrashed()->where('is_admin','1')->paginate(10);
        $allnotice = Notice::onlyTrashed()->paginate(10);
        
        return view('trashbox', compact('alldepartments','allbooks','allsemesters','allusers','alladmins','alds','allnotice'));
    }



    public function bookkill(Request $request)
    {
        $allbooks = Book::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Book Permanently Delete Successfully');

        return redirect()->back();
    }


    public function bookrestore(Request $request)
    {
        $allbooks = Book::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Book Restore Successfully');

        return redirect()->back();
    }



//admin


    public function viewadmins()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin','1')->paginate(10);
        return view('viewadmins', compact('allusers'));
    }


    public function addadmin(Request $request)
    {
        $ob = new User;

        $this->validate($request, [

            'name' => ['required','max:255'],
            'gender' => ['required','max:255'],
            'bubtid' => ['required','min:11', 'max:20','unique:users'],
            'department' => ['required','max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'intake' => ['required','max:2'],
            'password' => ['required','min:6','confirmed'],
            'section' => ['required','max:2'],
            'phonenumber' => ['required','min:11', 'max:14'],

        ]);

        $ob->name=$request->name;
        $ob->gender=$request->gender;
        $ob->bubtid=$request->bubtid;
        $ob->department=$request->department;
        $ob->is_admin=1;
        $ob->email=$request->email;
        $ob->intake=$request->intake;
        $ob->password=bcrypt($request->password);
        $ob->section=$request->section;
        $ob->phonenumber=$request->phonenumber;
        $ob->save();
        
        $email_data = array(
            'name' => $request->name,
            'bubtid' => $request->bubtid,
            'email' => $request->email,
            'password' => $request->password,
        );



        Mail::send('welcome', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to BUBTBOOKS')
                ->from('admin@bubtbooks.com', 'BUBTBOOKS');
        });

        session()->flash('notif','Admin Added Successfully');

        return redirect()->back();
    }


    public function deleteadmin(Request $request)
    {
        
        $ob = User::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Admin Trash Successfully');

        return redirect()->back();

    }

   public function updateadmin(Request $request)
    {

        $ob = User::findOrFail($request->id);

        $ob->update($request->all());
       
        session()->flash('notif','Admin Update Successfully');

        return redirect()->back();
    }



    public function adminkill(Request $request)
    {
        $allusers = User::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Admin Permanently Delete Successfully');

        return redirect()->back();
    }


    public function adminrestore(Request $request)
    {
        $allusers = User::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Admin Restore Successfully');

        return redirect()->back();
    }


    public function regadmin(Request $request)
    {
        $ob = new User;

        $this->validate($request, [
            
            'name' => ['required','max:255'],
            'gender' => ['required','max:255'],
            'bubtid' => ['required','min:11', 'max:20','unique:users'],
            'department' => ['required','max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'intake' => ['required','max:2'],
            'password' => ['required','min:6','confirmed'],
            'section' => ['required','max:2'],
            'phonenumber' => ['required','min:11', 'max:14'],

        ]);

        $ob->name=$request->name;
        $ob->gender=$request->gender;
        $ob->bubtid=$request->bubtid;
        $ob->department=$request->department;
        $ob->is_admin=1;
        $ob->email=$request->email;
        $ob->intake=$request->intake;
        $ob->password=bcrypt($request->password);
        $ob->section=$request->section;
        $ob->phonenumber=$request->phonenumber;
        $ob->save();

        return view('loading');
    }


//department
   

   public function adddepartment(Request $request)
    {
        $ob= new Department;
        $ob->depname=$request->depname;
        $ob->save();

        session()->flash('notif','Department Added Successfully');

        return redirect()->back();
    }


    public function viewdepartments()
    {
        Paginator::useBootstrap();
        $alldepartments = Department::paginate(10);
        return view('departments', compact('alldepartments'));
    }


    public function deletedepartment(Request $request)
    {
        
        $ob = Department::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Department Trash Successfully');

        return redirect()->back();

    }

   public function updatedepartment(Request $request)
    {

        $ob = Department::findOrFail($request->id);

        $ob->update($request->all());
       
        session()->flash('notif','Department Update Successfully');

        return redirect()->back();
    }


    public function depkill(Request $request)
    {
        $alldepartments = Department::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Department Permanently Delete Successfully');

        return redirect()->back();
    }


    public function deprestore(Request $request)
    {
        $alldepartments = Department::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Department Restore Successfully');

        return redirect()->back();
    }


//semester


    public function addsemester(Request $request)
    {

        $ob = new Semester;
        $ob->semname=$request->semname;
        $ob->depname=$request->depname;
        $ob->save();

        session()->flash('notif','Semester Added Successfully');

        return redirect()->back();
    }



    public function viewsemesters()
    {
        Paginator::useBootstrap();
        $alldepartments = Department::get();
        $allsemesters = Semester::paginate(10);

        return view('semesters', compact('alldepartments','allsemesters'));
    }


    public function deletesemester(Request $request)
    {
        
        $ob = Semester::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Semester Trash Successfully');

        return redirect()->back();

    }

   public function updatesemester(Request $request)
    {

        $ob = Semester::findOrFail($request->id);

        $ob->update($request->all());
       
        session()->flash('notif','Semester Update Successfully');

        return redirect()->back();
    }


    public function semkill(Request $request)
    {
        $allsemesters = Semester::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Semester Permanently Delete Successfully');

        return redirect()->back();
    }


    public function semrestore(Request $request)
    {
        $allsemesters = Semester::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Semester Restore Successfully');

        return redirect()->back();
    }

//count

    public function counts() {

        $users = User::where('is_admin','0')->count();
        $admins = User::where('is_admin','1')->count();
        $books = Book::count();
        $departments = Department::count();
        $semesters = Semester::count();
        $trashbox = Book::onlyTrashed()->get()->count()+Department::onlyTrashed()->get()->count()+Semester::onlyTrashed()->get()->count()+User::onlyTrashed()->where('is_admin','0')->get()->count()+User::onlyTrashed()->where('is_admin','1')->get()->count();
        $orders = Order::count();
        $totalsales = Order::all()->sum('paymentamount');
        $notices = Notice::count();
        $requests = Requests::where('is_seen','1')->count();
        $sellbooks = SellBook::count();
        $requestbooks = RequestBook::count();

        return view('admin', compact('users','admins','books','departments','semesters','trashbox','orders','totalsales','notices','requests','sellbooks','requestbooks'));
    }


    //roles

    public function viewroles()
    {
        Paginator::useBootstrap();
        $allusers = User::paginate(10);
        return view('roles', compact('allusers'));
    }


    public function makeadmin($id) {

        $user = User::find($id);

        $user->is_admin = 1;
        $user->save();

        session()->flash('notif','User Role Changed Successfully');

        return redirect()->back();
    }

    public function removeadmin($id) {

        $user = User::find($id);

        $user->is_admin = 0;
        $user->save();

        session()->flash('notif','User Role Changed Successfully');

        return redirect()->back();
        
    }


//department & polular books on index


    public function indexdepartments()
    {
        $allsettings = Settings::all()->where('id', '1');
        $alldepartments = Department::all();
        $allnewbooks = Book::orderBy('id', 'desc')->get()->take(5);
        $allreqbooks = RequestBook::orderBy('id', 'desc')->get()->take(15);
        $allbooks = Book::get()->sortByDesc('view_count')->take(15);
        $allnotice = Notice::orderBy('id', 'desc')->get()->take(6);
        $allsellbooks = SellBook::orderBy('id', 'desc')->where('status', 'Published')->get()->take(25);

        return view('index', compact('alldepartments','allbooks','allnotice','allsettings','allnewbooks','allreqbooks','allsellbooks')); 
    }



    public function showsemesters(Request $request) 
    {
        $alldepartments = Department::all()->where('depname', $request->depname);
        $allsemesters = Semester::all()->where('depname', $request->depname);
        $allbooks = Book::all()->where('depname', $request->depname);
        return view('allsemcat', compact('allsemesters','allbooks','alldepartments'));
    }


    public function showsemestersbooks(Request $request) 
    {
        Paginator::useBootstrap();
        $allsemesters = Semester::all()->where('depname', $request->depname)->where('semname', $request->semname);
        $allbooks = Book::where('depname', $request->depname)->where('semname', $request->semname)->paginate(10);
        return view('allsembooks', compact('allsemesters','allbooks'));
    }


    public function bookdownload($bookpdf)
    {
        return response()->download('bookpdf/'.$bookpdf);
    }



    public function readbook($id)
    {
        $ob = Book::find($id);
        
        return view('readbook', compact('ob'));
        return response()->file($pathToFile);
    }



    public function showbooks(Request $request)
    {
        $allbooks = Book::all()->where('bookname', $request->bookname)->where('depname', $request->depname)->where('semname', $request->semname);

        $allviews = Book::all()->where('bookname', $request->bookname)->first();

        $bookkey = 'book' . $allviews->id;

        if(!Session::has($bookkey))
        {
            $allviews->increment('view_count');
            Session::put($bookkey,1);
        }
        
        return view('book', compact('allbooks'));
    }


    public function downloadbook($id)
    {
        $allbooks = Book::all()->where('id', $id);
        
        return view('download', compact('allbooks'));
    }


    //cart

    public function cart()
    {        
        return view('cart');
    }

    public function deletetocart($id)
    {
        Cart::remove($id);

        session()->flash('notif','Book removed from cart');

        return redirect()->back();
    }


    public function incr($id)
    {

        $items = Cart::getContent();
         
         foreach($items as $item)
         {
            $ob = Book::find($item->id);

            if($ob->totalquantity > $item->quantity)
            {
                Cart::update($id, array(
                'quantity' => +1,
                ));
                session()->flash('notif','Book qunatity updated');
                return redirect()->back();
            }
            else
            {
                session()->flash('notif','Not enough qunatity');
                return redirect()->back();
            }

        }
    }
    public function decr($id)
    {
        $items = Cart::getContent();
         
         foreach($items as $item)
         {
            $ob = Book::find($item->id);

            if($item->quantity > 1)
            {
                Cart::update($id, array(
                'quantity' => -1,
                ));
                session()->flash('notif','Book qunatity updated');
                return redirect()->back();
            }
            else
            {
                session()->flash('notif','Order atleast 1 quantity');
                return redirect()->back();
            }

        }
    }



    public function addtocart()
    {
        $pdt = Book::find(request()->id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->bookname,
            'quantity' => 1,
            'price' => $pdt->sellingprice,
        ]);

        session()->flash('notif','Book Added to Cart');

        return redirect()->back();
    }

//checkout

    public function viewshippinginfo()
    {    
        return view('shippinginfo');
    }

    public function viewpayment()
    {    
        $allorders = OrderDetails::all();

        return view('payment', compact('allorders'));
    }

    public function vieworderreview()
    {    
        return view('orderreview');
    }



    public function shippinginfo(Request $request)
    {

        $ob = new OrderDetails;

        $this->validate($request, [
            'username'    =>  'required',
            'address'    =>  'required',
            'phonenumber'     =>  'required',
            'email'    =>  'required',
        ]);
        
        $ob->userid=$request->userid;
        $ob->username=$request->username;
        $ob->address=$request->address;
        $ob->phonenumber=$request->phonenumber;
        $ob->email=$request->email;

        $ob->save();

        $allorders = OrderDetails::all();

        return view('payment', compact('allorders'));
    }

    public function backshippinginfo()
    {

        $ob = Order::all()->orderBy('id', 'desc')->limit(1)->delete();
        $ob->delete();

        return view('shippinginfo');
    }


    public function payment(Request $request)
    {

        $ob = new Payment;

        $this->validate($request, [
            'paymentmethod'    =>  'required',
        ]);

        $ob->orderid=$request->orderid;
        $ob->trxid=$request->trxid;
        $ob->totalamount= Cart::getTotal();
        $ob->paymentmethod=$request->paymentmethod;
        $ob->senderphonenumber=$request->senderphonenumber;

        $ob->save();
       
        $allorders = OrderDetails::all();
        $allpayments = Payment::all();
        
        return view('orderreview', compact('allorders','allpayments'));

    }



    public function checkout(Request $request)
    {
        $items = Cart::getContent();
         
         foreach($items as $item)
         {
      
             OrderBook::create([
                 'bookid' => $item->id,
                 'bookname' => $item->name,
                 'quantity' => $item->quantity,
                 'bookprice' => $item->price,
                 'total' => $item->getPriceSum(),
                 'orderid' => $request->orderid,
                 'paymentid' => $request->paymentid,
                 
             ]);

            $ob = Book::find($item->id);
            $ob->update(['totalquantity' => $ob->totalquantity - $item->quantity]);

        }

        //$num_str = sprintf("%04d", mt_rand(1, 9999));

        //$invoice = IdGenerator::generate(['table' => 'orders', 'length' => 10, 'prefix' =>'BUBT-']);

        $ob = new Order;

        $ob->orderid=$request->orderid;
        $ob->userid=$request->userid;
        $ob->username=$request->username;
        $ob->address=$request->address;
        $ob->phonenumber=$request->phonenumber;
        $ob->email=$request->email;
        $ob->paymentid=$request->paymentid;
        $ob->trxid=$request->trxid;
        $ob->totalamount= Cart::getTotal();
        $ob->paymentmethod=$request->paymentmethod;
        $ob->save();

        $ob->invoice = "BUBT-$ob->id";
        $ob->save();

        $order_data = array(
            'invoice' => $ob->invoice,
            'username' => $request->username,
            'email' => $request->email,
            'paymentmethod' => $request->paymentmethod,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
        );



        Mail::send('ordermail', $order_data, function ($message) use ($order_data) {
            $message->to($order_data['email'], $order_data['username'])
                ->subject('Order Information')
                ->from('admin@bubtbooks.com', 'BUBTBOOKS');
        });

        Cart::clear();

        return view('thankyou');

    }

//orders

    public function vieworders()
    {
        //return view('vieworders')->with('allorders',Order::all());

        //users=order
        //posts=orderdetails

        //$allorders = OrderDetails::join('orders', 'order_details.id', '=', 'orders.orderid')->get(['orders.id','order_details.username','order_details.phonenumber','order_details.address','order_details.status']);
        Paginator::useBootstrap();
        $allorders = Order::orderBy('id', 'desc')->paginate(10);

        //$orders = OrderDetails::all()->where('id', $allorders->orderid);

        
        return view('vieworders', compact('allorders'));
    }


    public function vieworderpayment(Request $request)
    {

        $allpayments = Order::all()->where('id', $request->id);
        
        return view('vieworderpayment', compact('allpayments'));
    }


    //public function updatepayment(Request $request, $id)
    //{
        //$ob = Order::find($id);
        //$this->validate($request, [
            //'paymentamount'    =>  'required',

        //]);
            //$ob->paymentamount = $ob->paymentamount + $request->input('paymentamount');


            //$ob->save();
            //session()->flash('notif','Payment Update Successfully');

            //return redirect()->back();
    //}



    public function orders()
    {
        Paginator::useBootstrap();
        $user = Auth::user()->id;

        $allorders = Order::where('userid',$user)->paginate(10);

        
        return view('orders', compact('allorders'));
    }
    

    public function orderbooks(Request $request)
    {


        $allorderbooks = OrderBook::join('orders','orders.paymentid', '=', 'order_books.paymentid')->where('orders.id', $request->id)->get(['order_books.*']);

        //$total = Payment::join('orders','orders.paymentid', '=', 'payments.id',)->where('orders.id', $request->id)->get(['payments.*']);

        //$payment = Payment::join('orders','orders.paymentid', '=', 'payments.id',)->where('orders.id', $request->id)->get(['payments.*']);


        //$allorderbooks = OrderBook::all()->where('orderid', $request->id);

        $total = Order::all()->where('id', $request->id);

        $payment = Order::all()->where('id', $request->id);

        return view('orderbooks', compact('allorderbooks','total','payment'));

    }

    public function vieworderbooks(Request $request)
    {

        $allorderbooks = OrderBook::join('orders','orders.paymentid', '=', 'order_books.paymentid')->where('orders.id', $request->id)->get(['order_books.*']);

        //$allorderbooks = OrderBook::all()->where('orderid', $request->id);

        //$total = Payment::join('orders','orders.paymentid', '=', 'payments.id',)->where('orders.id', $request->id)->get(['payments.*']);

        $total = Order::all()->where('id', $request->id);

        //$payment = Payment::join('orders','orders.paymentid', '=', 'payments.id',)->where('orders.id', $request->id)->get(['payments.*']);

        $payment = Order::all()->where('id', $request->id);

        return view('vieworderbooks', compact('allorderbooks','total','payment'));

    }


    public function updateorderstatus(Request $request)
    {


        //$ob = OrderDetails::join('orders', 'order_details.id', '=', 'orders.orderid')->get(['order_details.status']);

        $ob = Order::findOrFail($request->id);

        $ob->paymentamount = $ob->paymentamount + $request->input('paymentamount');

        $ob->status = $request->input('status');
        $ob->save();

        //$ob->update($request->all());
       
        session()->flash('notif','Status Update Successfully');

        return redirect()->back();
    }

    //live chat


    public function viewactiveadmins()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin','1')->paginate(10);

        return view('userinbox', compact('allusers'));
    }


    public function viewactiveusers()
    {
        Paginator::useBootstrap();
        $allusers = Chat::groupBy('senderid')->where('receiverid', Auth::user()->id)->paginate(10);


        return view('admininbox', compact('allusers'));
    }


    public function viewadminchat(Request $request) 
    {
        $allusers = Chat::all()->where('senderid', $request->senderid);

        //$adminsend = Chat::all()->where('senderid', Auth::user()->id)->where('receiverid', $request->senderid);

        //$usersend = Chat::all()->where('receiverid', Auth::user()->id)->where('senderid', $request->senderid);

        $messages = Chat::all();

        $senderid = $request->senderid;


        $allmessages = Chat::all()->where('senderid', $request->senderid)->where('receiverid', Auth::user()->id);

        foreach ($allmessages as $msg) 
        {
            if ($msg->is_seen == '0') 
            {
                $msg->is_seen = 1;
                $msg->save();
            }
        }


        
        return view('adminchat', compact('allusers','messages','senderid'));
    }

    public function viewuserchat(Request $request)
    {
        $allusers = User::all()->where('id', $request->id);
 
        //$usersend = Chat::all()->where('senderid', Auth::user()->id)->where('receiverid', $request->id);

        //$adminsend = Chat::all()->where('senderid', $request->id)->where('receiverid', Auth::user()->id);

        $messages = Chat::all();

        $senderid = $request->id;


        $allmessages = Chat::all()->where('senderid',$request->id)->where('receiverid', Auth::user()->id);

        foreach ($allmessages as $msg) 
        {
            if ($msg->is_seen == '0') 
            {
                $msg->is_seen = 1;
                $msg->save();
            }
        }

     
        return view('userchat', compact('allusers','messages','senderid'));
    }


    public function usermessage(Request $request)
    {

        $ob = new Chat;
        $ob->senderid=$request->senderid;
        $ob->sendername=$request->sendername;
        $ob->receiverid=$request->receiverid;
        $ob->message=$request->message;
        $ob->save();

        session()->flash('notif','Message Sent Successfully');

        return redirect()->back();
    }


    public function adminmessage(Request $request)
    {

        $ob = new Chat;
        $ob->senderid=$request->senderid;
        $ob->sendername=$request->sendername;
        $ob->receiverid=$request->receiverid;
        $ob->message=$request->message;
        $ob->save();

        session()->flash('notif','Message Sent Successfully');

        return redirect()->back();
    }

    //notice board

    public function addnotice(Request $request)
    {
        $ob= new Notice;


        $this->validate($request, [
            'title' => ['required'],
            'description' => ['required','max:10000'],


        ]);

        $ob->title=$request->title;
        $ob->description=$request->description;

        if($request->hasfile('file'))
        {
            $file=$request->file('file');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('file/',$filename);
            $ob->file=$filename;
        }
        $ob->save();

        session()->flash('notif','Notice Added Successfully');

        return redirect()->back();
    }

    public function viewnotice()
    {
        Paginator::useBootstrap();
        $allnotice = Notice::orderBy('id', 'desc')->paginate(10);

        return view('viewnotice', compact('allnotice'));
    }


    public function deletenotice(Request $request)
    {
        
        $ob = Notice::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Notice Trash Successfully');

        return redirect()->back();

    }

   public function updatenotice(Request $request, $id)
    {
        $ob = Notice::find($id);
        $this->validate($request, [
            'title'    =>  'required',
            'description'    =>  'required',

        ]);
            $ob->title = $request->input('title');
            $ob->description = $request->input('description');


            if($request->hasfile('file'))
        {
            $file=$request->file('file');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('file/',$filename);
            $ob->file=$filename;
        }



            $ob->save();
            session()->flash('notif','Notice Update Successfully');

            return redirect()->back();
    }

    public function viewupdatenotice(Request $request)
    {

        $allnotice = Notice::all()->where('id', $request->id);
        
        return view('viewupdate', compact('allnotice'));
    }

    public function noticekill(Request $request)
    {
        $allnotice = Notice::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Notice Permanently Delete Successfully');

        return redirect()->back();
    }


    public function noticerestore(Request $request)
    {
        $allnotice = Notice::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Notice Restore Successfully');

        return redirect()->back();
    }


    public function readnotice($id)
    {
        $allnotice = Notice::find($id);
        
        return view('notice', compact('allnotice'));
    }


    public function viewupdatebook(Request $request)
    {

        $allbooks = Book::all()->where('id', $request->id);

        $alldepartments = Department::all();
        
        return view('updatebooks', compact('allbooks','alldepartments'));
    }

    public function notices()
    {
        Paginator::useBootstrap();
        $allnotice = Notice::orderBy('id', 'desc')->paginate(10);
        
        return view('notices', compact('allnotice'));
    }

    public function viewsettings()
    {
        $allsettings = Settings::all();
        
        return view('settings', compact('allsettings'));
    }

    public function updatesettings(Request $request)
    {
        $ob = Settings::find(1);


        if($request->hasfile('logo'))
        {
            $file=$request->file('logo');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(190, 45)->save( public_path('/img/' . $filename ) );
            $ob->logo=$filename;
        }


        if($request->hasfile('cover1'))
        {
            $file=$request->file('cover1');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover1=$filename;
        }


        if($request->hasfile('cover2'))
        {
            $file=$request->file('cover2');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover2=$filename;
        }


        if($request->hasfile('cover3'))
        {
            $file=$request->file('cover3');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover3=$filename;
        }



        $ob->title = $request->input('title');
        $ob->email = $request->input('email');
        $ob->phonenumber = $request->input('phonenumber');
        $ob->address = $request->input('address');

        $ob->save();

            
        session()->flash('notif','Settings Update Successfully');

        return redirect()->back();

    }

    public function contact(Request $request)
    {
        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to('khaledbubt@gmail.com')->send(new SendMail($data));


        session()->flash('notif','We received your message.Thank you !');

        return redirect()->back();
    }



    public function viewsearchuser()
    {
        return view('searchuser');
    }


    public function searchusers(Request $request)
    {
        Paginator::useBootstrap();
        $allusers = User::Where('is_admin','0')->Where('name', 'like', '%'.request('search').'%')->orWhere('bubtid', 'like', '%'.request('search').'%')->orWhere('email', 'like', '%'.request('search').'%')->orWhere('phonenumber', 'like', '%'.request('search').'%')->paginate(10);
        return view('searchuser', compact('allusers'));
    }


    public function viewsearchbooks()
    {
        return view('searchbook');
    }


    public function searchbooks(Request $request)
    {
        Paginator::useBootstrap();
        $allbooks = Book::where('bookname', 'like', '%'.request('search').'%')->orWhere('authorname', 'like', '%'.request('search').'%')->orWhere('depname', 'like', '%'.request('search').'%')->orWhere('semname', 'like', '%'.request('search').'%')->paginate(10);
        return view('searchbook', compact('allbooks'));
    }



    public function searchorders(Request $request)
    {
        Paginator::useBootstrap();
        $allorders = Order::Where('invoice', 'like', '%'.request('search').'%')->orWhere('username', 'like', '%'.request('search').'%')->orWhere('phonenumber', 'like', '%'.request('search').'%')->orWhere('email', 'like', '%'.request('search').'%')->orWhere('status', 'like', '%'.request('search').'%')->paginate(10);
        return view('searchorder', compact('allorders'));
    }
    
    
    public function search(Request $request)
    {
        Paginator::useBootstrap();
        $allbooks = Book::where('bookname','like',  '%' . request('query') . '%')->orWhere('coursecode','like',  '%' . request('query') . '%')->orWhere('authorname','like',  '%' . request('query') . '%')->orWhere('depname','like',  '%' . request('query') . '%')->paginate(10);

        return view('search')->with('allbooks', $allbooks)
                              ->with('bookname', 'Search results : ' . request('query'))
                              ->with('coursecode', 'Search results : ' . request('query'))
                              ->with('authorname', 'Search results : ' . request('query'))
                              ->with('depname', 'Search results : ' . request('query'))
                              ->with('query', request('query'));
    }

    public function pdf(Request $request)
    {
        $order = Order::find($request->id);

        $orderbooks = OrderBook::join('orders','orders.paymentid', '=', 'order_books.paymentid')->where('orders.id', $request->id)->get(['order_books.*']);

        $pdf = PDF::loadView('pdf', compact('order','orderbooks'));
        //return $pdf->download('invoice.pdf'); 
        return $pdf->stream('invoice.pdf');
    }
    
    
    //request book

    public function viewrequestbook()
    {
        Paginator::useBootstrap();
        $allreqbooks = Requests::orderBy('id', 'desc')->where('bubtid', Auth::user()->bubtid)->paginate(10);
        return view('requestbook', compact('allreqbooks'));
    }

    public function reqbook(Request $request)
    {
        $ob = new Requests;

        $ob->name=$request->name;
        $ob->bubtid=$request->bubtid;
        $ob->bookname=$request->bookname;
        $ob->authorname=$request->authorname;
        $ob->depname=$request->depname;
        $ob->semname=$request->semname;
        $ob->coursecode=$request->coursecode;
        $ob->booktype=$request->booktype;
        $ob->status='Pending';

        $ob->save();

        session()->flash('notif','Book Request Successfully');

        return redirect()->back();
    }


    public function viewreqbook()
    {
        Paginator::useBootstrap();
        $allreqbooks = Requests::paginate(10);
        
        $requests = Requests::all();

        foreach ($requests as $req) 
        {
            if ($req->is_seen == '0') 
            {
                $req->is_seen = 1;
                $req->save();
            }
        }
        
        return view('viewreqbook', compact('allreqbooks'));
    }


    public function updaterequest(Request $request)
    {

        $ob = Requests::findOrFail($request->id);

        $ob->bookname = $request->input('bookname');
        $ob->authorname = $request->input('authorname');
        $ob->depname = $request->input('depname');
        $ob->semname = $request->input('semname');
        $ob->coursecode = $request->input('coursecode');
        $ob->booktype = $request->input('booktype');

        $ob->save();
       
        session()->flash('notif','Request Update Successfully');

        return redirect()->back();
    }


    public function deleterequest(Request $request)
    {
        
        $ob = Requests::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Request Delete Successfully');

        return redirect()->back();

    }

    public function viewdeleterequest(Request $request)
    {
        
        $ob = Requests::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Request Delete Successfully');

        return redirect()->back();

    }

    public function updatereqstatus(Request $request)
    {
        $ob = Requests::findOrFail($request->id);

        $ob->status = $request->input('status');

        $ob->save();

            
        session()->flash('notif','Status Update Successfully');

        return redirect()->back();

    }


    public function viewreqbooks()
    {
        Paginator::useBootstrap();
        $allreqbooks = RequestBook::paginate(10);
        return view('reqbooks', compact('allreqbooks'));
    }


    public function addreqbook(Request $request)
    {
        $ob = new RequestBook;


        $this->validate($request, [
            'bookname'    =>  'required',
            'authorname'    =>  'required',
            'depname'     =>  'required',
            'semname'     =>  'required',
            'coursecode'     =>  'required',
            'bookpic'     =>  'required',
            'bookpdf'     =>  'required',
            'reqby'     =>  'required',


        ]);

        $ob->bookname=$request->bookname;
        $ob->authorname=$request->authorname;
        $ob->depname=$request->depname;
        $ob->semname=$request->semname;
        $ob->coursecode=$request->coursecode;
        $ob->reqby=$request->reqby;

        if($request->hasfile('bookpic'))
        {
            $file1=$request->file('bookpic');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/bookpic/' . $filename1 ) );
            $ob->bookpic=$filename1;
        }


        if($request->hasfile('bookpdf'))
        {
            $file=$request->file('bookpdf');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('bookpdf/',$filename);
            $ob->bookpdf=$filename;
        }
        $ob->save();

        session()->flash('notif','Requested Book Added Successfully');

        return redirect()->back();
    }

    public function viewupdatereqbook(Request $request)
    {

        $allreqbooks = RequestBook::all()->where('id', $request->id);
        
        return view('updatereqbook', compact('allreqbooks'));
    }

    public function updatereqbook(Request $request, $id)
    {
        $ob = RequestBook::find($id);
        $this->validate($request, [
            'bookname'    =>  'required',
            'authorname'    =>  'required',
            'coursecode'     =>  'required',
            'reqby'     =>  'required',

        ]);
            $ob->bookname = $request->input('bookname');
            $ob->authorname = $request->input('authorname');
            $ob->semname = $request->input('semname');
            $ob->depname = $request->input('depname');
            $ob->coursecode = $request->input('coursecode');
            $ob->reqby = $request->input('reqby');


        if($request->hasfile('bookpic'))
        {
            $file1=$request->file('bookpic');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/bookpic/' . $filename1 ) );
            $ob->bookpic=$filename1;
        }


        if($request->hasfile('bookpdf'))
        {
            $file=$request->file('bookpdf');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('bookpdf/',$filename);
            $ob->bookpdf=$filename;
        }



            $ob->save();

            session()->flash('notif','Requested Book Update Successfully');

            return redirect()->back();
    }


    public function showreqbooks(Request $request)
    {
        $allreqbooks = RequestBook::all()->where('id', $request->id);
        
        return view('reqbook', compact('allreqbooks'));
    }

    public function showallreqbooks(Request $request) 
    {
        Paginator::useBootstrap();
        $allreqbooks = RequestBook::orderBy('id', 'desc')->paginate(10);
        return view('allreqbooks', compact('allreqbooks'));
    }


    //sell book

    public function viewsellbook()
    {
        Paginator::useBootstrap();
        $allsellbooks = SellBook::orderBy('id', 'desc')->where('bubtid', Auth::user()->bubtid)->paginate(10);
        return view('sellbook', compact('allsellbooks'));
    }


    public function sellbook(Request $request)
    {
        $ob = new SellBook;

        $ob->name=$request->name;
        $ob->email=$request->email;
        $ob->bubtid=$request->bubtid;
        $ob->phonenumber=$request->phonenumber;
        $ob->bookname=$request->bookname;
        $ob->authorname=$request->authorname;
        $ob->depname=$request->depname;
        $ob->semname=$request->semname;
        $ob->coursecode=$request->coursecode;
        $ob->booktype=$request->booktype;
        $ob->price=$request->price;
        $ob->description=$request->description;
        $ob->status='Published';

        if($request->hasfile('bookpic'))
        {
            $file1=$request->file('bookpic');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/bookpic/' . $filename1 ) );
            $ob->bookpic=$filename1;
        }

        $ob->save();

        session()->flash('notif','Sell Book Added Successfully');

        return redirect()->back();
    }

    public function updatesellstatus(Request $request)
    {

        $ob = SellBook::findOrFail($request->id);
        $ob->status = $request->input('status');
        $ob->save();
       
        session()->flash('notif','Status Update Successfully');

        return redirect()->back();
    }

    public function deletesellbook(Request $request)
    {
        
        $ob = SellBook::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Sell Book Delete Successfully');

        return redirect()->back();

    }

    public function viewupdatesellbook(Request $request)
    {

        $allsellbooks = SellBook::all()->where('id', $request->id);
        
        return view('updatesellbook', compact('allsellbooks'));
    }

    //admin sell book

    public function viewallsellbook()
    {
        Paginator::useBootstrap();
        $allsellbooks = SellBook::orderBy('id', 'desc')->paginate(10);
        return view('viewsellbook', compact('allsellbooks'));
    }

    public function viewdeletesellbook(Request $request)
    {
        
        $ob = SellBook::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Sell Book Delete Successfully');

        return redirect()->back();

    }

    public function viewupdatesellstatus(Request $request)
    {

        $ob = SellBook::findOrFail($request->id);
        $ob->status = $request->input('status');
        $ob->save();
       
        session()->flash('notif','Status Update Successfully');

        return redirect()->back();
    }

    public function showallsellbooks(Request $request) 
    {
        Paginator::useBootstrap();
        $allsellbooks = SellBook::orderBy('id', 'desc')->where('status','Published')->paginate(10);
        return view('allsellbooks', compact('allsellbooks'));
    }

    public function showsellbooks(Request $request)
    {
        $allsellbooks = SellBook::all()->where('id', $request->id)->where('status', 'Published');
        
        return view('showsellbook', compact('allsellbooks'));
    }

    
}

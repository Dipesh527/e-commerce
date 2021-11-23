<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Question;
use Illuminate\Cache\RedisStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('/redirect');

        }
        else
        {
            $products = Product::all();
            return view('frontend.home',compact('products'));

        }
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype ;
        if($usertype=='1')
        {
            return view('admin.home');

        }
        else
        {
            $products = Product::all();
            $user= Auth()->user();
            $count= Cart::where('number',$user->number)->count();
            return view('frontend.home',compact('products','count'));
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if($search=='')
        {
            $products = Product::all();
            return view('frontend.home',compact('products'));
        }
        $products = Product::where('brand','Like','%'.$search.'%')->get();
        return view('frontend.home',compact('products'));
    }
    public function add_cart(Request $request,$id)
    {
        $user = Auth()->user();
        $products= Product::find($id);
        $carts = new Cart();
        $carts-> name = $user-> name ;
        $carts-> number = $user-> number ;
        $carts-> address = $user-> address ;
        $carts->brand= $products->brand;
        $carts->price= $products->price;
        $carts->quantity = $request->quantity;
        $carts->save();
        session()->flash('message','Cart is added successfully');
        return redirect()->back();
    }
    public function show_cart()
    {
        $user= Auth()->user();
        $carts= Cart::all();

        $count= Cart::where('number',$user->number)->count();
        return view('frontend.show_cart',compact('count','carts'));
    }
    public function delete_cart($id)
    {
        $carts= Cart::find($id);
        $carts->delete();
        return redirect()->back();
    }
    public function order(Request $request)
    {
        $user = Auth()->user();
        $name= $user->name;
        $number= $user->number;
        $address= $user->address;
        foreach($request->brand as $key=>$brand)
        {
            $order = new Order();
            $order->brand = $request->brand[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name=$name;
            $order->address=$address;
            $order->number=$number;
            $order->status='not delivered';
            $order->save();
        }
        
        DB::table('carts')->where('number',$number)->delete();
        
        return redirect()->back();

    }
    public function request()
    {
        $user= Auth()->user();
        $count= Cart::where('number',$user->number)->count();

        
        return view('frontend.request',compact('count'));
    }
    public function request_sent(Request $request)
    {
        $user = Auth()->user();
        $name= $user->name;
        $number= $user->number;
        $address= $user->address;
        $question =  new Question();
        $question->question = $request->question;
        $question->name=$name;
        $question->number=$number;
        $question->address=$address;
        $question->save();
        session()->flash('message','Request is sent successfully');
        return redirect()->back();
    }

}

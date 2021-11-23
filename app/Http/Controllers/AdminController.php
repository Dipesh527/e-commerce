<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Question;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AdminController extends Controller
{
    public function add_products()
    {
        return view('admin.add_products');
    }
    public function products(Request $request)
    {
        $products= new Product();
        $products->brand = $request->brand ;
        $products->price = $request->price ;
        $products->discount = $request->discount ;
        $products->description = $request->description ;
        $products->amount = $request->amount ;
        $image = $request->image;
        $imagename = time().'.' .$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $products->image= $imagename;
        $products->save();
        session()->flash('message','Product Created Successfully');
        return redirect()->back();
    }
    public function show_products()
    {
        $products= Product::all();
        return view('admin.show_products',compact('products'));
    }
    public function delete_products($id)
    {
        $products= Product::find($id);
        $products->delete();
        return redirect()->back();
    }
    public function update($id)
    {
        $product= Product::find($id);
        return view('admin.update',compact('product'));
    }
    public function update_products(Request $request,$id)
    {
        $products= Product::find($id);
        $products->brand = $request->brand ;
        $products->price = $request->price ;
        $products->discount = $request->discount ;
        $products->description = $request->description ;
        $products->amount = $request->amount ;
        $image = $request->image;
        $imagename = time().'.' .$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $products->image= $imagename;
        $products->update();
        session()->flash('message','Product Updated Successfully');
        return redirect()->back();
    }
    public function all_orders()
    {
        $orders = Order::all();
        return view('admin.all_orders',compact('orders'));
    }
    public function approved($id)
    {
        $approved = Order::find($id);
        $approved->status= 'delivered';
        $approved->save();
        return redirect()->back();
    }
    public function all_request()
    {
        $questions = Question::all();
        return view('admin.requests',compact('questions'));
    }

}

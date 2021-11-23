@extends('admin.home')
@section('main')
    <div class="container" style="text-align:center">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismis="alert">x</button>
                    {{ session()->get('message') }}  
                </div>
          
                @endif
                <form style="margin: 10px; padding: 10px" action="{{ url('update_products',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label style="padding: 15px" for="brand">Brand Name</label>
                        <input style="color:black" type="text" id="brand" name="brand" value="{{ $product->brand }}" required>
                    </div>
                    <div style="padding: 15px; align:center;" >
                        <h3>previous image</h3>
                        <img height="100" width="100" src="productimage/{{ $product->image }}" alt="">
                    </div>
                    <div>
                        <label style="padding: 15px" for="image">Upload Image</label>
                        <input  style="color:black" type="file" id="image" name="image"  required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="price">Price</label>
                        <input   style="color:black" type="text" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="discount">discount rate</label>
                        <input  style="color:black" type="text" id="discount" name="discount" value="{{ $product->discount }}" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="description">description</label>
                        <input  style="color:black" type="text" id="description" name="description" value="{{ $product->description }}" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="amount">Total pieces</label>
                        <input  style="color:black" type="text" id="amount" name="amount" value="{{ $product->amount}}" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
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
                <form style="margin: 10px; padding: 10px" action="{{ url('products') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label style="padding: 15px" for="brand">Brand Name</label>
                        <input style="color:black" type="text" id="brand" name="brand" placeholder="brand" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="image">Upload Image</label>
                        <input  style="color:black" type="file" id="image" name="image" placeholder="image" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="price">Price</label>
                        <input   style="color:black" type="text" id="price" name="price" placeholder="price" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="discount">discount rate</label>
                        <input  style="color:black" type="text" id="discount" name="discount" placeholder="discount" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="description">description</label>
                        <input  style="color:black" type="text" id="description" name="description" placeholder="description" required>
                    </div>
                    <div>
                        <label style="padding: 15px" for="amount">Total pieces</label>
                        <input  style="color:black" type="text" id="amount" name="amount" placeholder="amount" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
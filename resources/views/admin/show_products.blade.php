@extends('admin.home')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" style="color: white">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Title</td>
                            <td>price</td>
                            <td>discount Rate</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Total pieces</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id}}</td>
                                <td>{{ $product->brand}}</td>
                                <td>{{ $product->price}}</td>
                                <td>{{ $product->discount}}</td>
                                <td>{{ $product->description}}</td>
                                <td><img height="200px" width="200px" src="productimage/{{ $product->image }}" alt=""></td>
                                <td>{{ $product->amount}}</td>
                                <td>
                                    <a href="{{ url('update',$product->id) }}" class="btn btn-success btn-sm">update</a>
                                </td>
                                <td>
                                    <a href="{{ url('delete_products',$product->id) }}" class="btn btn-danger btn-sm">delete</a>
                                </td>

                   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
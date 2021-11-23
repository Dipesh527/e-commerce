@extends('admin.home')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" style="color: white">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Number</td>
                            <td>Brand</td>
                            <td>Price</td>
                            <td>Qunatity</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->number }}</td>
                                <td>{{ $order->brand }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->status }}</td>

                                <td>
                                    <a href="{{ url('approved',$order->id) }}" class="btn btn-success btn-sm">approved</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('admin.home')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Requests</th>
                            <th>Sent notification</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->name }}</td>
                                <td>{{ $question->number }}</td>
                                <td>{{ $question->address }}</td>
                                <td>{{ $question->question }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
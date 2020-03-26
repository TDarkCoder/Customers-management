@extends('layout')

@section('title', 'Our customers')

@section('content')

    <h2 class="my-3 text-center">Check out out customers list</h2>

    <div class="text-center">
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Add a new customer</a>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Status</th>
            </tr>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>
                        <a href="/customers/{{$customer->id}}">{{ $customer->name }}</a>
                    </td>
                    <td>{{ $customer->company->name }}</td>
                    <td>{{ $customer->active }}</td>
                </tr>
            @endforeach

        </table>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $customers->links() }}
        </div>
    </div>

@endsection

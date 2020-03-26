@extends('layout')

@section('title', 'Details for '. $customer->name )

@section('content')

    <h2 class="my-3 text-center">Details for {{ $customer->name }}</h2>


    <div class="row mt-4 justify-content-center">
        @if($customer->image)
            <div class="col-4">
                <img src="{{ asset('storage/'.$customer->image) }}"  alt="">
            </div>
        @endif
        <div class="col-8 text-left">
            <p><strong>Name: </strong>{{ $customer->name }}</p>
            <p><strong>Email: </strong>{{ $customer->email }}</p>
            <p><strong>Company: </strong>{{ $customer->company->name }}</p>
            <p><strong>Status: </strong>{{ $customer->active }}</p>
        </div>
        <div class="col-7 text-center">
            <a href="/customers/{{ $customer->id }}/edit" class="btn btn-primary">Edit</a>
            <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" class="d-inline-block" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

@endsection

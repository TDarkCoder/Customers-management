@extends('layout')

@section('title', 'Details for '. $customer->name )

@section('content')

    <h2 class="my-3 text-center">Edit details for {{ $customer->name }}</h2>

    <div class="row">
        <div class="col-12 text-center">
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @include('customers.form')
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>


@endsection

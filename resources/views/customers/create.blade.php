@extends('layout')

@section('title', 'Our customers')

@section('content')

    <h2 class="my-3 text-center">Add a new customer</h2>

    <div class="text-center">

        <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">

            @include('customers.form')

            <button type="submit" class="btn btn-success">Add</button>

        </form>
    </div>

@endsection

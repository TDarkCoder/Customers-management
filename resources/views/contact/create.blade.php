@extends('layout')

@section('title', 'Our contacts')

@section('content')

    <h2 class="my-3 text-center">Contacts</h2>

    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success!</strong> {{ session()->get('message') }}
        </div>
    @endif

    @if(!session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <form action="{{ route('contact.store') }}" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                        <span>{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                        <span>{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                        <span>{{ $errors->first('message') }}</span>
                    </div>
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

@endsection

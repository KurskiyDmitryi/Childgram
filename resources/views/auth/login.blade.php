@extends('layouts.base')
@section('title')
    Welcome to Childgram :: Login
@endsection
@section('content')
    <div class="welcome">
        <h1>Welcome to Childgram</h1>
    </div>
    <div class="form-container login">
        {{Form::open(['route'=>'login'])}}
        <h2>Login</h2>
        {{Form::email('email','',['placeholder'=>'Email','class'=>'form-control' . (($errors->has('email'))?' is-invalid':'')])}}
        @if ($errors->has('email'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        {{Form::password('password',['placeholder'=>'Password','class'=>'form-control' . (($errors->has('password'))?' is-invalid':'')])}}
        @if ($errors->has('password'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        {{Form::submit('Login')}}
        {{Form::close()}}
        <div class="form-links">
            {{link_to_route('register','Register')}}
            {{link_to('','Forgot password')}}
        </div>
    </div>
@endsection


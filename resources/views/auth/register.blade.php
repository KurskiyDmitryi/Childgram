@extends('layouts.base')
@section('title')
    Welcome to Childgram :: Register
@endsection
@section('content')
    <div class="welcome">
        <h1>Welcome to Childgram</h1>
    </div>
    <div class="form-container login">
        {{Form::open(['route'=>'register'])}}
        <h2>Register</h2>
        {{Form::text('name','',['placeholder'=>'Name','class'=>'form-control' . (($errors->has('name'))?' is-invalid':'')])}}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
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
        {{Form::password('password_confirmation',['placeholder'=>'Confirm Password','class'=>'form-control' . (($errors->has('password_confirmation'))?' is-invalid':'')])}}
        @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('password_confirm') }}</strong>
        </span>
        @endif
        <div class="captcha">
            <div class="captcha_image">{!! captcha_img('math') !!}</div>
            <div class="captcha_input"><input name="captcha"></div>
        </div>
        {{Form::submit('Submit',['class' => 'ssss'])}}
        {{Form::close()}}
    </div>
@endsection

@extends('layouts.base')
@section('title')
    Welcome to Childgram
@endsection
@section('content')
    <div class="welcome nunito">
        <h1>Welcome to Childgram</h1>
    </div>
    <div>
        <h2 class="welcome">
            Our app helps you to keep memory about how grow up your children . We are offer you that :
            Make foto of your children every day and send it through our app , more you can add some description or
            wishes
            below every foto(our advice for every child you need different account in app). All of this will be save on
            email what you resgistered , then you can give data of it to your child and he will have every day memory of
            his
            childhood.
        </h2></div>
    <h1 class="today-date">Today is : {{date('d-m-y')}}</h1>
    @if($count < 3)
        <div>
            {{ Form::open(['method' => 'post', 'enctype' => 'multipart/form-data','route'=>'sendMail','files'=>'true']) }}
            {{ Form::file('file', ['class' => $errors->has('file') ? 'is-invalid' : '', 'id' => 'file']) }}

            @if($errors->has('file'))
                <div class="invalid-feedback">
                    {{ $errors->first('file') }}
                </div>
            @endif
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control', 'id' => 'description']) }}

            @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif
            {{ Form::hidden('user_id', Auth::user()->id) }}
            {{Form::button('Upload',['class'=>'btn btn-primary','type'=>'submit'])}}
            {{ Form::close() }}
        </div>
    @endif
    <div>
        <h3 class="welcome">Every day you can send 3 photo</h3>
        <h2 class="count nunito welcome">Today you sent {{$count}} / 3 photo</h2>
    </div>
@endsection


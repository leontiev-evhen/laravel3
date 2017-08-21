@extends('layout')

@section('content')
    <div class="col-md-6">
        <ul class="errors">
            @foreach($errors->all('<li>:message</li>') as $message)
                {{ $message }}
            @endforeach
        </ul>

        {{ Form:: open(['url' => 'auth/login', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label ('Email', 'Email*') }}
            {{ Form::text ('email', '', ['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form::label ('Password', 'Password*') }}
            {{ Form::password ('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form::label ('Remember', 'Remember') }}
            {{ Form::checkbox('remember', '1') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form:: close() }}
    </div>
    <div class="col-md-12">
        or <a href="{{URL::to('signup/login')}}">Register</a>
    </div>
@stop

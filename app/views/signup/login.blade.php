@extends('layout')

@section('content')
    <div class="col-md-6">
        <ul class="errors">
            @foreach($errors->all('<li>:message</li>') as $message)
                {{ $message }}
            @endforeach
        </ul>

        {{ Form:: open(['url' => 'signup/login', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form:: label ('Name', 'Name*') }}
            {{ Form:: text ('name', '', ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form:: label ('Email', 'Email*') }}
            {{ Form:: text ('email', '', ['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form:: label ('Password', 'Password*') }}
            {{ Form:: password ('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form:: label ('ConfirmPassword', 'ConfirmPassword*') }}
            {{ Form:: password ('password_confirmation', ['placeholder' => 'Confirm password', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form:: close() }}
    </div>

@stop
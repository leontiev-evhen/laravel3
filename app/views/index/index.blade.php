@extends('layout')

@section('content')
    <div class="col-md-6">
        @if($errors->first('url'))
            <p>{{{$errors->first('url')}}}</p>
        @endif

        {{ Form:: open(['url' => 'make-url', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label ('Url', 'Url') }}
            {{ Form::text ('url', '', ['placeholder' => 'url', 'class' => 'form-control', 'id' => 'formGroupExampleInput' ]) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Make URL', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form:: close() }}
    </div>
    <div class="col-md-12">
        @if(Auth::check())
        <a href="{{URL::to('auth/logout')}}" class = 'btn btn-primary'>Logout</a>
        @endif
    </div>
@stop

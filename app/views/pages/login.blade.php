<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/6/14
 * Time: 7:17 AM
 */
?>

@extends('layouts.sidebar')
@section('content')
<div class="large-10 columns">
    <form action="login" method="post" name="order_form" id="order_form">
<h1>Login</h1>

<!-- if there are login errors, show them here -->
<div class="row">
    <div class="large-12 columns">
        <div style="color: #f04124">
            {{ $errors->first('email') }}
            {{ $errors->first('password') }}
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
    </div>
</div>


<p>{{ Form::submit('Login',array('class'=>'button')) }}</p>
{{ Form::close() }}
    </div>
@stop
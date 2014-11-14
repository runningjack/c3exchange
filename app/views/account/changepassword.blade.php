<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/9/14
 * Time: 9:51 AM
 */
?>

@extends("layouts.account")
@section("content")


<div class="large-12 columns">
    <h2>Change Password</h2>
    <form action="changepass" method="post" id="chpass" name="chpass">
        @if(Session::has('message'))

            {{ Session::get('message') }}

        @endif
        @if($errors->has("order_amount"))
        <div class='alert-box alert'> {{$errors->first("order_amount","<li>:message</li>")}}</div>
        @endif
        @if($errors->has("ecurrency"))
        <div class='alert-box alert'> {{$errors->first("ecurrency","<li>:message</li>")}}</div>
        @endif
        @if($errors->has("cus_fullname"))
        <div class='alert-box alert'> {{$errors->first("cus_fullname","<li>:message</li>")}}</div>
        @endif
        @if($errors->has("cus_email"))
        <div class='alert-box alert'> {{$errors->first("cus_email","<li>:message</li>")}}</div>
        @endif

        <hr>
        <div class="row">
            <div class="large-6 columns">
                {{ Form::label('oldpass', 'password') }}
                {{ Form::text('oldpass') }}
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                {{ Form::label('password', 'new Password') }}
                {{ Form::password('password') }}
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                {{ Form::label('repass', 'comfirm password') }}
                {{ Form::password('repass') }}
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                {{ Form::submit('Change',array('class'=>'button')) }}</p>
                {{ Form::close() }}
            </div>

        </div>
    </form>
</div>



@stop
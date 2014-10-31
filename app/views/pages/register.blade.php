<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/6/14
 * Time: 7:39 AM
 */
?>

@extends("layouts.sidebar")
@section("reserve")
<div class="featured-box featured-box-quaternary" style="height: auto;">
    <div class="box-content" style="padding:15px 0 0 6px;">

        <h4>Our E-currencies Reserve</h4>
        <ul class="no-bullet" style="padding:20px 15px">
            @foreach($reserves as $reserve)
            {{"<li style='text-align: left'>
                <div class='post-info'><a href='#'><img src='img/$reserve->img_url' alt='$reserve->ecurrency'></a>
                    <div class='post-meta' style='float:right'> $ $reserve->reserve_amount</div>
                </div>
            </li>"}}
            @endforeach
        </ul>
    </div>
</div>
@stop
@section("content")
<div class="pghead"><h2 class=" color_gold">Register</h2></div>
<div class="large-10 columns">

        <h2 >Register</h2>
        {{ Form::open(array('url'=>'register', 'method'=>'post','action'=>'pages@sendContact')) }}
        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('fname', ' First Name', array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">

                {{ Form::text('fname',Input::old('fname'),  array('placeholder'=>'First Name','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('lname','Last Name',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('lname',Input::old('lname'),array('placeholder'=>'Last Name','class'=>'large-12','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('phone','Telephone',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('phone',Input::old('phone'),array('placeholder'=>'Your phone number','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('address','Contact Address',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('address',Input::old('address'),array('placeholder'=>'Contact Address','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('country','Country',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                <select name="country" required="required">
                    <option value="0" selected="" disabled="">Country</option>
                    @foreach($country as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('city','City ',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('city',Input::old('city'),array('placeholder'=>'city/region/province/state'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('email','Email ',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('email',Input::old('email'),array('placeholder'=>'email address','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('username','Username',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::text('username',Input::old('username'),array('placeholder'=>'username','required'=>'required'))}}
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                {{ Form::label('password','password',array('class' => 'awesome')) }}
            </div>
            <div class="large-8 columns">
                {{ Form::password('password',Input::old('password'),array('placeholder'=>'password','required'=>'required'))}}
            </div>
        </div>

    <div class="row">
        <div class="large-4 columns">
            {{ Form::label('confirmp','confirm password',array('class' => 'awesome')) }}
        </div>
        <div class="large-8 columns">
            {{ Form::password('confirmp',array('placeholder'=>'password','required'=>'required'))}}
        </div>
    </div>

        <div class="row">
            <div class="large-4 columns">
                <p>&nbsp;</p>
            </div>
            <div class="large-4 columns">
                {{ Form::submit('Submit', array('class'=>'button'))}}

            </div>
            <div class="large-4 columns">
                {{ Form::reset('Reset', array('class'=>'button'))}}
            </div>
        </div>
        {{ Form::close()}}
</div>
@stop
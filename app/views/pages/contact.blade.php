<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 9:17 AM
 */
?>
@extends("layouts.sidebar")

@section('content')

<div id="contact" class="row padded-row">
    <div class="large-10 columns">
        <div class="large-6 columns">
            <div class=" pghead"><h2 class=" color_gold">Contact Us</h2></div>
            {{ Form::open(array('url'=>'doContact', 'method'=>'post','action'=>'pages@sendContact')) }}
                <div class="row">

                    <div class="large-12 columns">
                        {{ Form::label('contact_name', ' Your Name', array('class' => 'awesome')) }}
                        {{ Form::text('contact_name',Input::old('contact_name'),  array('placeholder'=>'Your Name'))}}
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        {{ Form::label('email','Email',array('class' => 'awesome')) }}
                        {{ Form::text('email',Input::old('email'),array('placeholder'=>'youremail@domain.com','class'=>'large-12'))}}
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        {{ Form::label('phone','Telephone',array('class' => 'awesome')) }}
                        {{ Form::text('phone',Input::old('phone'),array('placeholder'=>'Your phone number'))}}
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">

                         {{ Form::label('subject','Subject',array('class' => 'awesome')) }}
                         {{ Form::text('subject',Input::old('subject'),array('placeholder'=>'Subject'))}}

                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        {{ Form::label('message','Your Message',array('class' => 'awesome')) }}
                        {{ Form::textarea('message')}}
                    </div>
                </div>

                <div class="row">
                    <div class="large-6 columns">
                        <a href="#" class="button [radius round]">Send </a>
                    </div>
                    <div class="large-6 columns">
                        <a href="#" class="button [radius round]">Reset </a>
                    </div>
                </div>
           {{ Form::close()}}

        </div>
        </div>
</div>
@stop
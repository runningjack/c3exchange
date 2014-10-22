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

        <div class="row">

            <div class="large-3 columns profile-pic">
                <img src="http://localhost/jssresult/public/img/avatars/sunny-big.png">

            </div>
            <div class="large-6 columns">
                <h1 style="letter-spacing: -1px;
font-size: 24px;
margin: 10px 0;">{{strtoupper(Auth::user()->fname)}} <span class="semi-bold">{{ strtoupper(Auth::user()->lname)}}</span>
                    <br>
                    <small>Date Registered: {{Auth::user()->created_at}}</small></h1>

                <ul class="list-unstyled" style="list-style: none;padding-left: 0; margin: 0">
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken">+234</span>)
                            <span class="txt-color-darken"> {{Auth::user()->phone}}</span>
                        </p>
                    </li>
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;{{Auth::user()->email}}
                        </p>
                    </li>
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-home"></i>&nbsp;&nbsp;<span class="txt-color-darken">Address</span>
                        <address>{{Auth::user()->address}}</address>
                        <address>{{Auth::user()->city}}</address>
                        <address>{{Auth::user()->state}}</address>
                        <address>{{Auth::user()->country}}</address>
                        </p>
                    </li>

                </ul>

                <br>

            </div>


        </div>

    </div>



@stop
<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/9/14
 * Time: 9:01 PM
 */?>
@extends("layouts.account")
@section("content")
<div class="portlet box green">
    <div class="portlet-title">
        <h4><i class="fa fa-icon-list"></i>Orders</h4>

    </div>
    <div class="row">

        <div class="portlet-body">
            <p>
            <div class="row">
                <div class="large-4 columns">
                    <h5>Order Number:</h5>
                </div>
                <div class="large-8 columns">
                    {{$myorder->order_id}}
                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <h5>Order Type:</h5>
                </div>
                <div class="large-8 columns">
                    {{$myorder->order_type}}
                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <h5>Source:</h5>
                </div>
                <div class="large-8 columns">
                    <div class="row">
                        <div class="col-md-1">
                            <strong>
                                <i>{{$myorder->order_amount}}</i>
                            </strong>
                        </div>
                        <div class="large-6 columns left">
                            {{$myorder->ecurrency}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <h5>Receiving Transaction:</h5>
                </div>
                <div class="large-8 columns">
                    <div class="row">
                        <div class="col-md-1">
                            <strong><i>{{$myorder->final_amount}}</i></strong>
                        </div>
                        <div class="large-6 columns left">{{$myorder->order_transfer_type}}</div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="large-4 columns">
                    <h5>Amount:</h5>
                </div>
                <div class="large-8 columns">
                    {{$myorder->order_amount}}
                </div>
            </div>

            </p>
        </div>
    </div>
</div>
@stop
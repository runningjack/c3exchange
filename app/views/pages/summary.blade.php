<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/9/14
 * Time: 12:22 AM
 */
?>
@extends("layouts.template")
@section('content')
<div id="page_title"><h1>Summary</h1></div>
<div class="large-12 columns">


    <div class="row">
        <h4>Exchange Detail</h4>
    <table>
      <!--  <caption>Exchange Detail</caption>-->
        <tr>

            <th scope="column">Description</th>
            <th scope="column">Amount ( {{$order->currency}} )</th>
        </tr>
        <tr>

            <td>you are exchanging <strong>{{$order->currency}}</strong> {{$order->ecurrency}} (USD) at the rate of
                Exchange rate : 1 {{$order->ecurrency}} = {{$order->offer_amount}} NGN </td>
            <td> {{$order->order_amount}} </td>
        </tr>
        <tr>

            <td scope="row">Fee</td>
            <td scope="row">0.00</td>
        </tr>
        <tr>

            <td>You will Receive
            @if($order->order_type == "Sell")
                {{$order->oder_transfer_type}}
            @elseif($order->order_type == "Buy")
                {{$order->ecurrency}}
            @endif

            </td>
            <td>{{$order->total_amount}}</td>
        </tr>
    </table>
    </div>
    <span>&nbsp;</span>
    <div class="row">
        <h4>Your E-currency Detail</h4>
    </div>

    <div class="row">
        <div class="large-4 columns">
            E-currency Account <strong>({{$order->ecurrency}})</strong>
        </div>
        <div class="large-8 columns">
            <strong>{{$order->ecurrency_account}}</strong>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
           E-currency Account Title
        </div>
        <div class="large-8 columns">
            <strong>{{$order->ecurrency_title}}</strong>
        </div>
    </div>

<span>&nbsp;</span>
@if($order->order_type == "Sell")
    <div class="row">
        <h4>Your Bank Detail</h4>
    </div>

    <div class="row">
        <div class="large-4 columns">
            Account Title
        </div>
        <div class="large-8 columns">
            <strong>{{$order->bank_account_name}}</strong>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            Bank Swift Code
        </div>
        <div class="large-8 columns">
            <strong>{{$order->bank_swift_code}}</strong>
        </div>
    </div>
    <div class="row">
        <div class="large-4 columns">
            Account No
        </div>
        <div class="large-8 columns">
            <strong>{{$order->bank_account_no}}</strong>
        </div>
    </div>
    <span>&nbsp;</span>
    <div class="row">

        <div class="large-4 columns">
            Bank Name
        </div>
        <div class="large-8 columns">
            <strong>{{$order->bank_name}}</strong>
        </div>
    </div>

    <div class="row">
        <div class="large-4 columns">
            Bank Address
        </div>
        <div class="large-8 columns">
            <address>{{$order->bank_address}}</address>
            <address>{{$order->bank_city}}</address>
            <address>{{$order->bank_state}}</address>
            <address>{{$order->bank_country}}</address>
        </div>
    </div>
    @endif
    <span>&nbsp;</span>
        <form action="orderPost" method="post" name="order_form" id="order_form">
            <div class="row">
                <div class="large-5 columns">
                    <button type="submit" class="button" value="Confirm order">Confirm order</button>
                </div>
                <div class="large-5 columns">

                </div>
            </div>
        </form>


</div>
@stop
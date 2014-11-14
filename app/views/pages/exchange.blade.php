<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 11/2/14
 * Time: 2:11 PM
 */

?>

@extends("layouts.template")
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

<div class="featured-box featured-box-quaternary" style="height: auto;">
    <div class="box-content" style="padding:15px 0 0 6px;">

        <h4>Exchange Rates</h4>
       <div class="row">
           <div class="large-6 columns"><h4>From</h4></div>
           <div class="large-6 columns"><h4>To</h4></div>
       </div>
            <?php
                foreach($exchanges as $exchange){
                $cpair = explode("_", $exchange->currency_pair);
                $evalue = explode(":",$exchange->exchange);
            echo "<div class='row'>
                <div class='large-6 columns' style='text-align: left'>$evalue[0] $cpair[0]</div>
                <div class='large-6 columns' style='text-align: left'>$evalue[1] $cpair[1]</div>
            </div>";

}
?>

    </div>
</div>
@stop
@section("content")

<div class="row">
<div class=" pghead"><h2 class=" color_gold">Exchange E- Currency</h2></div>

    @if(Session::has('message'))
    <div class="alert-box alert">
        <h5 style="color:#fff !important">{{ Session::get('message') }}</h5>
    </div>
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

<form action="summary" method="post" name="order_form" id="order_form">

<div class="row">
    <div class="large-4 columns"><label>I want to Exhange:</label></div>
    <div class="large-3 columns" style="padding-right:0;">
        <input type="text"  name="order_amount" id="order_amount"  value="100" >
    </div>
    <div class="large-3 columns left">
        <select   name="ecurrency" id="ecurrency" class="ecurrency" required="required">

            @foreach($currencies as $currency)
            <option value="{{$currency->id}} {{$currency->ecurrency}} {{ $currency->currency}}">{{$currency->ecurrency}} {{ $currency->currency}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <label>You will get</label>
    </div>
    <div class="large-3 columns">
        <div class="row text-center"> <b><span id="FINAL_AMOUNT" class="view-only"> </span></b><p></p>
        </div>
    </div>
    <div class="large-3 columns left">
        <select  name="order_transfer_type" id="exchange_transfer" class="ecurrency">
            @foreach($currencies as $currency)
                <option value="{{$currency->id}} {{$currency->ecurrency}} {{ $currency->currency}}">{{$currency->ecurrency}} {{ $currency->currency}}</option>
            @endforeach
        </select>
    </div>
</div>
    <div class="row" id="excdetail">


    </div>
<div class="row">
    <div class="large-4 columns">
        <label>Your <span id="destTxt">C-gold <i>(USD)</i></span>Account</label>
    </div>
    <div class="large-6 columns left">
        <input  type="text" maxlength="50" name="ecurrency_account" id="ecurrency_account" value="" required="required">
    </div>
</div>
    <legend>Personal information:</legend>
    <hr />
    <div class="row">
        <div class="large-4 columns">
            Full Name<strong>*</strong>
        </div><div class="large-6 columns left">
            <input  type="text" name="cus_fullname" id="cus_fullname" value="">
        </div>
    </div>

    <div class="row">
        <div class="large-4 columns">
            E-mail address<strong>*</strong>
        </div>
        <div class="large-6 columns left">
            <input  type="text" name="cus_email" id="cus_email" value="">
        </div>
    </div>

<!-- <b>Our fee <span id="OUR_FEE">20% (Our max fee: 10.00 USD)</span></b> + <b><span id="METHOD_FEE">25 USD Bank wire</span> fee</b></div><div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div>-->

<div class="row" id="ERR_MESSAGE" style="color:#990000;; font-weight:bold">

</div>
<input  name="order_type" id="order_type" value="Exchange" type="hidden">
<input name="total_amount" id="total_amount" value="0" type="hidden">
<input name="final_amount" id="final_amount" value="0" type="hidden">
<input name="offer_amount" id="offer_amount" value="0" type="hidden">
<input name="ecurrency_title" id="ecurrency_title" value="0" type="hidden">
<div class="large-12 columns">
    Enter your account type and your account number.
    Please take extra caution to ensure that you enter the correct account number for the account type you specify.
</div>

<label class="checkbox">
    <input type="checkbox" value="true" name="licence_agreement" id="licence_agreement" required="required">
    I agree to the <a href="legal" target="_blank">
        Terms and Conditions.</a>
</label>
<div class="row">
    <div class="large-5 columns">
        <button type="submit" class="button" value="Preview order">Preview order</button>
    </div>
    <div class="large-5 columns">

    </div>
</div><br>

<div class="row">
    <strong>*</strong> indicates <b>required</b> fields
</div></fieldset>
</form>

</div>

@stop
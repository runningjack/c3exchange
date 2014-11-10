<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 10:32 AM
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
@stop
@section("content")

<div class="row">
<div class=" pghead"><h2 class=" color_gold">Sell E- Currency</h2></div>

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
    <div class="large-4 columns"><label>I want to sell:</label></div>
    <div class="large-3 columns" style="padding-right:0;">
        <input type="text"  name="order_amount" id="order_amount"  value="100" >
    </div>
    <div class="large-3 columns left">
        <select   name="ecurrency" id="ecurrency" class="ecurrency">
            <option value="">--SELECT E-CURRENCY--</option>
            @foreach($currencies as $currency)
            <option value="{{$currency->ecurrency}} {{ $currency->currency}}">{{$currency->ecurrency}} {{ $currency->currency}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <label>To my <span id="methodText">Bank wire</span></label>
    </div>
    <div class="large-6 columns left">
        <select   name="order_transfer_type" id="order_transfer_type">
            @foreach($etypes as $etype)
            <option value="{{$etype->paytype}} {{ $etype->paycurrency}}">{{$etype->paytype}} {{ $etype->paycurrency}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <label>Your <span id="destTxt">C-gold <i>(USD)</i></span>Account</label>
    </div>
    <div class="large-6 columns left">
        <input  type="text" maxlength="50" name="ecurrency_account" id="ecurrency_account" value="">
    </div>
</div>


   <!-- <b>Our fee <span id="OUR_FEE">20% (Our max fee: 10.00 USD)</span></b> + <b><span id="METHOD_FEE">25 USD Bank wire</span> fee</b></div><div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div>--><div class="row text-center">You will recieve <b><span id="FINAL_AMOUNT" class="view-only">65.00 Bank wire(USD) </span></b><p></p>
</div>

<div class="row" id="ERR_MESSAGE" style="color:#990000;; font-weight:bold">

</div>
<input  name="order_type" id="order_type" value="Sell" type="hidden">
<input name="total_amount" id="total_amount" value="0" type="hidden">
<input name="final_amount" id="final_amount" value="0" type="hidden">
<input name="offer_amount" id="offer_amount" value="0" type="hidden">
<input name="ecurrency_title" id="ecurrency_title" value="0" type="hidden">
<div class="large-12 columns">
    Enter your account type and your account number.
    Please take extra caution to ensure that you enter the correct account number for the account type you specify.
</div>
<legend>Bank information:</legend>
<hr />
<div class="row">
    <div class="large-4 columns">
        Bank account number / IBAN<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_account_no" id="bank_account_no" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank SWIFT / BIC code<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_swift_code" id="bank_swift_code" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Account Name<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_account_name" id="bank_account_name" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank Name<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_name" id="bank_name" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank City<strong>*</strong>
    </div><div class="large-6 columns left ">
        <input  type="text" name="bank_city" id="bank_city" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank State<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_state" id="bank_state" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Zip<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="bank_zip" id="bank_zip" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Address<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <textarea  rows="2" name="bank_address" id="bank_address">

        </textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Name (If applicable)
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="termediary_name" id="termediary_name" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Bank SWIFT/Routing (If applicable)
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="termediary_swift" id="termediary_swift" value="">
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
<div class="row">
    <div class="large-4 columns">
        Address (line 1)<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <textarea  rows="2" name="cus_address" id="cus_address"></textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        City<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="cus_city" id="cus_city" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        State or Province or Territory<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <input  type="text" name="cus_state" id="cus_state" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Zip/Postal Code<strong>*</strong>
    </div><div class="large-6 columns left">
        <input  type="text" name="cus_zip" id="cus_zip" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Country<strong>*</strong>
    </div>
    <div class="large-6 columns left">
        <select  name="cus_country" id="cus_country">
            <option value="0" selected="" disabled="">Country</option>
            @foreach($country as $country)
            <option value="{{$country->name}}">{{$country->name}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Questions or comments
    </div>
    <div class="large-6 columns left">
        <textarea  rows="3" name="comment" id="comment">

        </textarea>
    </div>
</div>
<div class="row">
    Your order will not be submitted until you click <b>Confirm Order</b> on the next page.
</div>
<!--<div class="row">
    <div class="large-7 columns" style="padding-right:6px;">
        <input placeholder="Code" class="form-control placeholder" type="text" name="turning_buysell" id="turning_buysell" autocomplete="off">
    </div>
    <div class="large-1 columns" style="padding:9px 0 0 0;">

    </div>
</div>-->

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
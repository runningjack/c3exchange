<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 10:32 AM
 */
?>

@extends("layouts.template")
@section("content")
<div class="row">
<h2>Sell E- Currency</h2>
<div id="status_box">
<div id="dynMsg"></div>
<form action="" method="post" name="order_form" id="order_form">
<fieldset><legend>Sell e-currency to us</legend>
<div class="row">
    <div class="large-4 columns"><label>I want to sell:</label></div>
    <div class="large-3 columns" style="padding-right:0;">
        <input type="text"  name="order_amount" id="order_amount" onkeyup="AmountChange(this.form, 'sell');" value="100" >
    </div>
    <div class="large-3 columns">
        <select  onchange="ValChange(this.form, 'sell');" name="cid" id="cid">
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
    <div class="large-6 columns">
        <select  onchange="AmountChange(this.form, 'sell');" name="method_id" id="method_id">
            @foreach($etypes as $etype)
            <option value="{{$etype->paytype}} {{ $etype->paycurrency}}">{{$etype->paytype}} {{ $etype->paycurrency}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <label>Your <span id="dstText">C-gold <i>(USD)</i></span>Account</label>
    </div>
    <div class="large-6 columns">
        <input  type="text" maxlength="50" name="currency_account" id="currency_account" value="">
    </div>
</div>

<div class="row text-center">
    <b>Our fee <span id="OUR_FEE">20% (Our max fee: 10.00 USD)</span></b> + <b><span id="METHOD_FEE">25 USD Bank wire</span> fee</b></div><div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div><div class="row text-center">You will recieve <b><span id="FINAL_AMOUNT" class="view-only">65.00 Bank wire(USD) </span></b><p></p>
</div>
<div class="row" id="ERR_MESSAGE" style="color:#990000;; font-weight:bold">

</div>
<input  name="order_type" id="order_type" value="sell" type="hidden">
<div class="row">
    Enter your account type and your account number.
    Please take extra caution to ensure that you enter the correct account number for the account type you specify.
</div>
<legend>Bank information:</legend>
<hr />
<div class="row">
    <div class="large-4 columns">
        Bank account number / IBAN<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_iban_number" id="bank_iban_number" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank SWIFT / BIC code<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_swift_code" id="bank_swift_code" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Account Name<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_account_name" id="bank_account_name" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank Name<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_name" id="bank_name" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank City<strong>*</strong>
    </div><div class="large-6 columns">
        <input  type="text" name="bank_city" id="bank_city" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank State<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_state" id="bank_state" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Zip<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="bank_zip_code" id="bank_zip_code" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Address<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <textarea  rows="2" name="bank_address" id="bank_address">

        </textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Name (If applicable)
    </div>
    <div class="large-6 columns">
        <input  type="text" name="termediary_name" id="termediary_name" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Bank SWIFT/Routing (If applicable)
    </div>
    <div class="large-6 columns">
        <input  type="text" name="termediary_swift" id="termediary_swift" value="">
    </div>
</div>

<legend>Personal information:</legend>
<hr />
<div class="row">
    <div class="large-4 columns">
        Full Name<strong>*</strong>
    </div><div class="large-6 columns">
        <input  type="text" name="full_name" id="full_name" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        E-mail address<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="email_address" id="email_address" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Address (line 1)<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <textarea  rows="2" name="personal_address" id="personal_address">

        </textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        City<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="city" id="city" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        State or Province or Territory<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input  type="text" name="state" id="state" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Zip/Postal Code<strong>*</strong>
    </div><div class="large-6 columns">
        <input  type="text" name="zip_code" id="zip_code" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Country<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <select  name="country" id="country">
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
    <div class="large-6 columns">
        <textarea  rows="3" name="comment" id="comment">

        </textarea>
    </div>
</div>
<div class="row">
    Your order will not be submitted until you click <b>Confirm Order</b> on the next page.
</div>
<div class="row">
    <div class="large-7 columns" style="padding-right:6px;">
        <input placeholder="Code" class="form-control placeholder" type="text" name="turning_buysell" id="turning_buysell" autocomplete="off">
    </div>
    <div class="large-1 columns" style="padding:9px 0 0 0;">

    </div>
</div>

<label class="checkbox">
    <input type="checkbox" value="true" name="licence_agreement" id="licence_agreement">
    I agree to the <a href="terms" target="_blank">
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
<script language="JavaScript">ValChange(document.getElementById('order_form'),'sell');
</script>
</div>
</div>
@stop
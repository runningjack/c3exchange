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
        <select class="form-control" onchange="ValChange(this.form, 'sell');" name="cid" id="cid">
            <option value="5">C-gold USD</option>
            <option value="6">Perfectmoney USD</option>
            <option value="7">Pecunix USD</option>
            <option value="13">Payza USD</option>
            <option value="30">Bitcoin BTC</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <label>To my <span id="methodText">Bank wire</span></label>
    </div>
    <div class="large-6 columns">
        <select class="form-control" onchange="AmountChange(this.form, 'sell');" name="method_id" id="method_id">
            <option value="3">Bank Deposit NGN</option>
            <option value="1">Bank wire USD</option>
            <option value="2">Bank wire EUR</option>
            <option value="6">MoneyGrams USD</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <label>Your <span id="dstText">C-gold <i>(USD)</i></span>Account</label>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" maxlength="50" name="currency_account" id="currency_account" value="">
    </div>
</div>

<div class="row text-center">
    <b>Our fee <span id="OUR_FEE">20% (Our max fee: 10.00 USD)</span></b> + <b><span id="METHOD_FEE">25 USD Bank wire</span> fee</b></div><div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div><div class="row text-center">You will recieve <b><span id="FINAL_AMOUNT" class="view-only">65.00 Bank wire(USD) </span></b><p></p>
</div>
<div class="row" id="ERR_MESSAGE" style="color:#990000;; font-weight:bold">

</div>
<input class="form-control" name="order_type" id="order_type" value="sell" type="hidden">
<div class="row">
    Enter your account type and your account number.
    Please take extra caution to ensure that you enter the correct account number for the account type you specify.
</div>
<legend>Bank information:</legend>
<div class="row">
    <div class="large-4 columns">
        Bank account number / IBAN<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_iban_number|req" id="bank_iban_number|req" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank SWIFT / BIC code<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_swift_code|req" id="bank_swift_code|req" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Account Name<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_account_name|req" id="bank_account_name|req" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank Name<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_name|req" id="bank_name|req" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank City<strong>*</strong>
    </div><div class="large-6 columns">
        <input class="form-control" type="text" name="bank_city|req" id="bank_city|req" value="">
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Bank State<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_state|req" id="bank_state|req" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Zip<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="bank_zip_code|req" id="bank_zip_code|req" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Address<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <textarea class="form-control" rows="2" name="bank_address|req" id="bank_address|req">

        </textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        Bank Name (If applicable)
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="termediary_name" id="termediary_name" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Bank SWIFT/Routing (If applicable)
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="termediary_swift" id="termediary_swift" value="">
    </div>
</div>

<legend>Personal information:</legend>
<div class="row">
    <div class="large-4 columns">
        Full Name<strong>*</strong>
    </div><div class="large-6 columns">
        <input class="form-control" type="text" name="full_name|req" id="full_name|req" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        E-mail address<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="email_address|req" id="email_address|req" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Address (line 1)<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <textarea class="form-control" rows="2" name="personal_address|req" id="personal_address|req">

        </textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        City<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="city|req" id="city|req" value="">
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        State or Province or Territory<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <input class="form-control" type="text" name="state|req" id="state|req" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Zip/Postal Code<strong>*</strong>
    </div><div class="large-6 columns">
        <input class="form-control" type="text" name="zip_code|req" id="zip_code|req" value="">
    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        Country<strong>*</strong>
    </div>
    <div class="large-6 columns">
        <select class="form-control" name="country|req" id="country|req">
        </select>
    </div>
</div>


<div class="row">
    <div class="large-4 columns">
        Questions or comments
    </div>
    <div class="large-6 columns">
        <textarea class="form-control" rows="3" name="comment" id="comment">

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
    <input type="checkbox" value="true" name="licence_agreement|req" id="licence_agreement|req">
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
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
        <script language="javascript">var rate = new Array();var ratePercent = new Array();var minAmt = new Array();var maxAmt = new Array();var ValName = new Array();var ValWorth = new Array();var MaxFee = new Array();ratePercent[5] = '0'; minAmt[5] = 20; maxAmt[5] = 100; ValName[5] = 'C-gold'; ValWorth[5] = 'USD'; MaxFee[5] = 10; ratePercent[6] = '10'; minAmt[6] = 10; maxAmt[6] = 0; ValName[6] = 'Perfectmoney'; ValWorth[6] = 'USD'; MaxFee[6] = 0; ratePercent[7] = '0'; minAmt[7] = 0; maxAmt[7] = 0; ValName[7] = 'Pecunix'; ValWorth[7] = 'USD'; MaxFee[7] = 0; ratePercent[13] = '5'; minAmt[13] = 0; maxAmt[13] = 0; ValName[13] = 'Payza'; ValWorth[13] = 'USD'; MaxFee[13] = 0; ratePercent[30] = '5'; minAmt[30] = 0; maxAmt[30] = 0; ValName[30] = 'Bitcoin'; ValWorth[30] = 'BTC'; MaxFee[30] = 0; var methodFee = new Array();var methodWorth = new Array();var methodName = new Array();methodFee[1] = '25'; methodWorth[1] = 'USD'; methodName[1] = 'Bank wire'; methodFee[2] = '25'; methodWorth[2] = 'EUR'; methodName[2] = 'Bank wire'; methodFee[3] = '20'; methodWorth[3] = 'SGD'; methodName[3] = 'Bank wire'; methodFee[6] = '30'; methodWorth[6] = 'USD'; methodName[6] = 'MoneyGrams'; var langErr = new Array();langErr[1] = "Can not read currenct currency rates, please contact us about this issue";langErr[2] = "Minimum order amount is";langErr[3] = "Maximum order amount is";</script>

        <script language="JavaScript" src="http://demo.auto-exchanger.com/_skins/responsive/tpljs/order.js"></script>
        <div id="page_title"><h1>Buy E-currency</h1></div>

        <div id="status_box">
            <div id="dynMsg"></div>

            <form method="post" action="#" name="order_form" id="order_form">
                <fieldset>
                    <legend>Select e-currency you would like to buy</legend>

                    <div class="row">
                        <div class="large-4 columns">I am sending  <span id="methodText">Bank wire/Bank Deposit</span>:</div>
                        <div class="large-3 columns" style="padding-right:0;">
                            <input  type="text" name="order_amount" id="order_amount" onkeyup="AmountChange(this.form, 'buy');" value="100">
                        </div>
                        <div class="large-4 columns">
                            <select  onchange="ValChange(this.form, 'buy');" name="method_id" id="method_id">
                                @foreach($currencies as $currency)
                                <option value="{{$currency->ecurrency}} {{ $currency->currency}}">{{$currency->ecurrency}} {{ $currency->currency}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">You will receive:</div>
                        <div class="large-3 columns" style="padding-right:0;">
                            <input class=" currency_select" type="text" name="FINAL_AMOUNT" id="FINAL_AMOUNT" readonly="true" disabled="disabled" >
                        </div>
                        <div class="large-4 columns">
                            <select  onchange="AmountChange(this.form,'buy');" name="cid" id="cid">

                                @foreach($etypes as $etype)
                                <option value="{{$etype->paytype}} {{ $etype->paycurrency}}">{{$etype->paytype}} {{ $etype->paycurrency}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input name="order_type" id="order_type" value="buy" type="hidden">
                    <div class="row text-center"><b>Our fee <span id="OUR_FEE">0%</span></b></div>
                    <div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div>
                    <div class="row text-center" id="ERR_MESSAGE" style="color:#990000;"></div>
                    <div class="row">Enter your account type and your account number. Please take extra caution to ensure that you enter the correct account number for the account type you specify.</div>
                    <div class="row"><strong>*</strong> indicates <b>required</b> fields</div>

                    <legend>Currency inflammations:</legend>
                    <hr />
                    <div class="row">
                        <div class="large-4 columns">Your <u id="dstText">C-gold <i>(USD)</i></u><strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="currency_account" id="currency_account" value=""></div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">Your account Name (Title) <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="account_name|req" id="account_name|req" value=""></div>
                    </div>


                    <legend>Personal information:</legend>
                    <hr />
                    <div class="row">
                        <div class="large-4 columns">E-mail address <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="email_address|req" id="email_address|req" value=""></div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">Full Name <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="full_name|req" id="full_name|req" value=""></div>
                    </div>


                    <div class="row">
                        <div class="large-4 columns">Country <strong>*</strong>: </div>
                        <div class="large-6 columns">
                            <select  name="country|req" id="country|req">
                                <option value="0" selected="" disabled="">Country</option>
                                @foreach($country as $country)
                                <option value="{{$country->name}}">{{$country->name}}</option>
                                @endforeach
                            </select></div>
                    </div>

                    <div class="row">Please enter your full contact phone number below, INCLUDING country codes. </div>
                    <div class="row">
                        <div class="large-4 columns">Phone Number <strong>*</strong>:</div>
                        <div class="large-6 columns"><input  type="text" name="phone_number|req" id="phone_number|req" value=""></div>
                    </div>
                    <!--
                    <label id="cell_phone_number"><span>SMS/Cell phone Number :</span>
                    <input  name="cell_phone_number" id="cell_phone_number" value="" /></label>
                    -->
                    <div class="row">Your IP Address: 41.220.69.150</div>
                    <input  name="ip_address" type="hidden" id="ip_address" value="41.220.69.150">


                    <div class="row">Your order will not be submitted until you click <b>Confirm Order</b> on the next page.</div>

                    <label class="checkbox">
                        <input name="licence_agreement|req" id="licence_agreement|req" type="checkbox" class="checkbox" value="true" style="width:20px"> I agree to the <a href="http://demo.auto-exchanger.com/nview.php?title=Terms of services" target="_blank">Terms and Conditions.</a>
                    </label>

                    <div class="row">
                        <div class="large-7 columns" style="padding-right:6px;"><input placeholder="Code"  type="text" name="turning_buysell" id="turning_buysell" autocomplete="off"></div>
                        <div class="large-1 columns" style="padding:9px 0 0 0;"></div>
                    </div>



                    <div class="row">
                        <div class="large-5 columns"><button type="submit" class="button" value="Preview order">Preview order</button></div>
                        <div class="large-5 columns"></div>
                    </div>



                </fieldset>
            </form>
            <script language="JavaScript"> AmountChange(document.getElementById('order_form'), 'buy'); </script>




        </div>
        <br><br>
</div>
@stop
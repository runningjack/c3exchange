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
    <div class="pghead"><h2 class=" color_gold">{{$title}}</h2></div>

        <div id="status_box">
            <div id="dynMsg"></div>

            <form method="post" action="summary" name="order_form" id="order_form">
                <fieldset>
                    <legend>Select e-currency you would like to buy</legend>

                    <div class="row">
                        <div class="large-4 columns">I am sending  <span id="methodText">Bank wire/Bank Deposit</span>:</div>
                        <div class="large-3 columns" style="padding-right:0;">
                            <input  type="text" name="order_amount" id="order_amount"  value="100" required="required">
                        </div>
                        <div class="large-4 columns">
                            <select   name="order_transfer_type" id="order_transfer_type" required="required">
                                @foreach($etypes as $etype)
                                <option value="{{$etype->paytype}} {{ $etype->paycurrency}}">{{$etype->paytype}} {{ $etype->paycurrency}}</option>
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
                            <select   name="ecurrency" id="ecurrency" required="required">
                                @foreach($currencies as $currency)
                                <option value="{{$currency->ecurrency}} {{ $currency->currency}}">{{$currency->ecurrency}} {{ $currency->currency}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input name="order_type" id="order_type" value="Buy" type="hidden">
                    <input name="total_amount" id="total_amount" value="0" type="hidden">
                    <input name="final_amount" id="final_amount" value="0" type="hidden">
                    <input name="offer_amount" id="offer_amount" value="0" type="hidden">
                    <input name="ecurrency_title" id="ecurrency_title" value="0" type="hidden">
                    <div class="row text-center"><b>Our fee <span id="OUR_FEE">0%</span></b></div>
                    <!--<div class="row text-center"><i>Exchange Rates <span id="WORTH_RATE">1.00 USD = 1.00 USD</span></i></div>-->
                    <div class="row text-center" id="ERR_MESSAGE" style="color:#990000;"></div>
                    <div class="row">Enter your account type and your account number. Please take extra caution to ensure that you enter the correct account number for the account type you specify.</div>
                    <div class="row"><strong>*</strong> indicates <b>required</b> fields</div>

                    <legend>Currency informations:</legend>
                    <hr />
                    <div class="row">
                        <div class="large-4 columns">Your <u id="destTxt"></u><strong>*</strong>:</div>
                        <div class="large-6 columns"><input  type="text" name="ecurrency_account" id="ecurrency_account" value="" required="required"></div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">Your account Name (Title) <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="ecurrency_title" id="ecurrency_title" value="" required="required"></div>
                    </div>


                    <legend>Personal information:</legend>
                    <hr />
                    <div class="row">
                        <div class="large-4 columns">E-mail address <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="cus_email" id="cus_email" value="" required="required"></div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">Full Name <strong>*</strong>: </div>
                        <div class="large-6 columns"><input  type="text" name="cus_fullname" id="cus_fullname" value="" required="required"></div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">
                            Address (line 1)<strong>*</strong>
                        </div>
                        <div class="large-6 columns">
                            <textarea  rows="2" name="cus_address" id="cus_address" required="required"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">
                            City<strong>*</strong>
                        </div>
                        <div class="large-6 columns">
                            <input  type="text" name="cus_city" id="cus_city" value="" required="required">
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-4 columns">
                            State or Province or Territory<strong>*</strong>
                        </div>
                        <div class="large-6 columns">
                            <input  type="text" name="cus_state" id="cus_state" value="" required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-4 columns">
                            Zip/Postal Code<strong>*</strong>
                        </div><div class="large-6 columns">
                            <input  type="text" name="cus_zip" id="cus_zip" value="" required="">
                        </div>
                    </div>


                    <div class="row">
                        <div class="large-4 columns">Country <strong>*</strong>: </div>
                        <div class="large-6 columns">
                            <select  name="cus_country" id="cus_country" required="required">
                                <option value="" selected="" disabled="">Country</option>
                                @foreach($country as $country)
                                <option value="{{$country->name}}">{{$country->name}}</option>
                                @endforeach
                            </select></div>
                    </div>

                    <div class="row">Please enter your full contact phone number below, INCLUDING country codes. </div>
                    <div class="row">
                        <div class="large-4 columns">Phone Number <strong>*</strong>:</div>
                        <div class="large-6 columns"><input  type="text" name="cus_phone" id="cus_phone" value="" required="required"></div>
                    </div>
                    <!--
                    <label id="cell_phone_number"><span>SMS/Cell phone Number :</span>
                    <input  name="cell_phone_number" id="cell_phone_number" value="" /></label>
                    -->
                    <div class="row"></div>
                    <input  name="ip_address" type="hidden" id="ip_address" value="41.220.69.150">


                    <div class="row">Your order will not be submitted until you click <b>Confirm Order</b> on the next page.</div>

                    <label class="checkbox">
                        <input name="licence_agreement" id="licence_agreement" required="required" type="checkbox" class="checkbox" value="true" style="width:20px"> I agree to the <a href="http://demo.auto-exchanger.com/nview.php?title=Terms of services" target="_blank">Terms and Conditions.</a>
                    </label>
<!--
                    <div class="row">
                        <div class="large-7 columns" style="padding-right:6px;"><input placeholder="Code"  type="text" name="turning_buysell" id="turning_buysell" autocomplete="off"></div>
                        <div class="large-1 columns" style="padding:9px 0 0 0;"></div>
                    </div>
-->


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
<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 9:17 AM
 */
?>

@extends("layouts.default")
@section("content")


<div class="large-8 columns">
    <div class="">
        <h2><strong>Welcome to</strong> CG3 Exchange</h2>

        <p>
            C3G Exchange&nbsp;is an on-line E-currency exchange solution, where you can buy and sell e-currencies,
            Handling everything from signup to automatic payout, C3G Exchange&nbsp; is a powerful
            business automation platform  that puts you firmly in control.        </p>
        <img src="img/gold_lock.jpg" class="responsive pull-left">
        <p>
            <strong>Exchange your E-currencies</strong> with us and benefit of our experience and technical support. Be sure we will help you make your business grow the fastest possible.
        </p>

        <p></p>

        <div class="hr"></div>
        <p></p>
    </div>
    <br>

    <div class="row">


    </div>
    <div class="row">

        <div class="large-12 columns">
            <h1>Rates</h1>
            <table class="large-12">
                <tr>
                    <th>Currency</th>
                    <th>Buy</th>
                    <th>Sell</th>
                    <th>Reserve</th>
                </tr>
                @foreach($reserves as $reserve)
                <tr>

                    <td data-th="Movie Title">{{"<img src='img/$reserve->img_url' alt='$reserve->ecurrency'>"}}</td>
                    <td data-th="Genre">$
                        @foreach($rates as $rate)
                            @if($rate->cur_id === $reserve->id)
                                @if($rate->extype === 'Buy')
                                {{number_format($rate->rate, 2, '.', '')}}
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td data-th="Year"> $
                        @foreach($rates as $rate)
                            @if($rate->cur_id === $reserve->id)
                                @if($rate->extype === 'Sell')
                                {{number_format($rate->rate, 2, '.', '')}}
                                @endif
                            @endif
                        @endforeach

                    </td>
                    <td data-th="Gross">$ {{number_format($reserve->reserve_amount, 2, '.', ',')}}</td>

                </tr>
                @endforeach
            </table>


        </div>

        <!--<div class="large-6 columns">
            <div class="feature-box">
                <div class="feature-box-icon">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="shorter">Credit &amp; Debit Cards</h4>
                    <p class="tall">Ability to accept all major credit/Debit Cards</p>
                </div>
            </div>
            <div class="feature-box">

                <div class="feature-box-icon">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="shorter">Fraud Prevention</h4>
                    <p class="tall">Stopping all fraudulent transactions by super extra security</p>
                </div>
            </div>
            <div class="feature-box">
                <div class="feature-box-icon">
                    <i class="fa fa-group"></i>
                </div>
                <div class="feature-box-info">
                    <h4 class="shorter">Affiliate Program</h4>
                    <p class="tall">Customers can earn money by inserting widget on their site</p>
                </div>
            </div>

        </div>-->
    </div>
</div>


<div class="large-4 columns">



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
            <h4>ُSupported E-currencies &amp; Merchants</h4>
            <ul class="flickr-feed currencies">
                <li><a data-original-title="Wire Transfer" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/bank_4.gif" alt="Traditional Wire Transfer"></span></a></li>
                <li><a data-original-title="C-gold" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/c-gold_4.gif" alt="C-gold"></span></a></li>
                <li><a data-original-title="CashU" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/cashu_4.gif" alt="Cashu"></span></a></li>
                <li><a data-original-title="Offline Debit/Credit Cards" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/debit_card_4.gif" alt="Offline Debit/Credit Cards"></span></a></li>
                <li><a data-original-title="E-gold" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/e-gold_4.gif" alt="E-gold"></span></a></li>
                <li><a data-original-title="Payza" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/payza_4.gif" alt="Payza"></span></a></li>
                <li><a data-original-title="LiqPay" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/liqpay_4.gif" alt="Liqpay"></span></a></li>
                <li><a data-original-title="Moneybookers" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/moneybookers_4.gif" alt="Moneybookers"></span></a></li>
                <li><a data-original-title="Paypal" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/paypal_4.gif" alt="PayPal"></span></a></li>
                <li><a data-original-title="Webmoney" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/webmoney_4.gif" alt="Webmoney"></span></a></li>
                <li><a data-original-title="WorldPay(Credit/Debit card)" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/worldpay_4.gif" alt="WorldPay(Credit/Debit card)"></span></a></li>
                <li><a data-original-title="Pay Safe Card" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/paysafecard_4.gif" alt="Pay Safe Card"></span></a></li>
                <li><a data-original-title="Pecunix" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/pecunix_4.gif" alt="Pecunix"></span></a></li>
                <li><a data-original-title="Bitcoin" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/bitcoin_4.gif" alt="Bitcoin"></span></a></li>
                <li><a data-original-title="PerfectMoney" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/perfectmoney_4.gif" alt="PerfectMoney"></span></a></li>
                <li><a data-original-title="Solid Trust Pay" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/solidtrustpay_4.gif" alt="Solid Trust Pay"></span></a></li>
                <li><a data-original-title="OkPay" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/okpay_4.gif" alt="OkPay"></span></a></li>
                <li><a data-original-title="Ukash" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/ukash_4.gif" alt="Ukash"></span></a></li>
                <li><a data-original-title="EgoPay" href="javascript:;" rel="tooltip"><span class="thumbnail"><img src="img/egopay_4.gif" alt="EgoPay"></span></a></li>
            </ul>
        </div>
    </div>
</div><!-- End large-4 -->
@stop

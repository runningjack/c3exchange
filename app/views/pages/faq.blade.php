
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


<div class="large-12 columns pghead"><h2 class=" color_gold">Privacy</h2></div>
<div class="large-12 columns">





    <h4><span class="color-blue"> How can I buy e-currency with you?</span></h4>
    <p>You can easily do that by clicking on the {{HTML::linkRoute('buy_currency', 'Buy')}} link<br>
        <strong><br>Step 1.</strong> Start the transaction by filling in the buy e-currency form. You can order to buy even if you are not registered.
        <br>You select the destination e-currencies and select the medium through which you want to payment through Nigerian banks ,
        type in the amount in Nigerian Naira you want to pay to the bank. The equivalence in the e-currency you want to receive, destination account number
        and your e-mail. <br><br>
        <strong>Step 2.</strong> Check the details of your order, read and accept our User agreement, and confirm your order. <br><br>
        <strong>Step 3.</strong> You'll be redirected to the site of the e-currency system where you should make the payment.
        Also, you will get a confirmation email with the payment instructions and a link that you can use if you'd like to make the payment later.
        Please note that all the unpaid orders are cancelled in 1 hour. <br><br>You can check the status of your transaction as you log in and
        enter our Members area (you will find the password in the email that we will send to you upon the confirmation of your order).
        <br>Normally, you'll get your e-currency account funded within several minutes. <br></p>
    <h4><span class="color-blue"> How can I sell  with you?</span></h4>
    <p>You must fill our currency order page:
        {{HTML::linkRoute('sell_currency', 'Sell')}}
        <br></p>
    <h4><span class="color-blue">What does the commission I pay include?</span></h4>
    <p>
        On C3G exchange you don't pay commission except if you are selling a currency and you want us to wire money to you from outside
        Nigeria to you bank <accountzz>a</accountzz>

        <br><br></p>
    <h4><span class="color-blue">What status     can my order have?</span>
    </h4><p><strong>open</strong> - you have placed a new Order and you are welcome to make the specified spending. <br>
        <strong>received</strong> - we have received the money from you, according to your Order. <br>
        <strong>sent</strong> - we have sent money to the payee's account. <br>
        <strong>closed</strong> - your Order is completed. <br>
        <strong>manual_processing</strong> - your Order will be processed by operator. <br>
        <strong>cancelled</strong> - the Order is cancelled by the User's request. <br>
        <strong>expired</strong> - the Order has expired. This status is inherit from the status of 'open' if the User has not made the specified spending within the said period of time. <br>
        <strong>declined</strong> - in case if we suspect fraud or other violation of the User agreement, we reserve the right to decline the transaction. <br>
        <strong>refunded</strong> - the money has been returned to the User. <br><br></p>


    <h4><span class="color-blue">Why should I register with C3G Exchange</span></h4><p>You can access our exchange services without registration and logging in into the member area but for being our affiliate,  profile and receive our weekly newsletter you need to be registered.</p>

    <br>


    <div style="text-align:center"><ul id="wp-pagenavi"></ul></div>

    <center>{{HTML::linkRoute('home','Back to Home')}}</center>


    <br><br>
</div>

@stop
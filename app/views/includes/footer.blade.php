<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 9:19 AM
 */
?>

<footer>
    <div class="container">
        <div class="row">

            <div class="large-5 columns">
                <h4>Newsletter</h4>
                <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
                <div class="row">
                    <div class="large-8 columns">
                        <form class="form" action="#" method="POST">

                            <div class="">
                                <div class="row collapse">

                                    <div class="small-10 columns">
                                        <input type="text" placeholder="Enter your email" />
                                    </div>
                                    <div class="small-2 columns">
                                        <span class="postfix">Go!</span>
                                    </div>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="large-3 columns">
                <h4>Our Office</h4>
                <div id="tweet" class="twitter">
                    <p><!-- Languages --->
                    </p><div class="language_box">

                        </div>
                    <p><address>44 Osolo Way off MM In't Airport Rd Ajao Estate</address>
                    <address>70 Mushin Road, Isolo Lagos. </address>
                    <address>12 Association Avenue Surulere Ijesha Lagos,</address>
                    </p>
                </div>
            </div>
            <div class="large-4 columns">
                <div class="contact-details">
                    <h4>Help Center</h4>
                    <ul class="side-nav" role="navigation" title="Link List">
                        <li role="menuitem"><a href="#">Why E-currencies are growing?</a></li>
                        <li role="menuitem"><a href="#">What is E-currency exchange business</a></li>
                        <li role="menuitem"><p><i class="fa fa-envelope"></i> <strong style="">Email:</strong> <a style="display: inline" href="mailto:support@c3exchanger.com">support@c3exchanger.com</a></p></li>


                    </ul>

                </div>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="large-1 columns">
                    <a href="#" class="logo">
                        <img alt="Auto Exchanger " src="img/logo-bottom.gif">
                    </a>
                </div>
                <div class="large-5 columns">
                    <p> © 2014 All Rights reserved by {{HTML::linkRoute('home','C3G EXCHANGE.')}}</p>
                </div>
                <div class="large-5 columns">
                    <dl class="sub-nav" role="menu" title="Filter Menu List">
                        <dd role="menuitem"><a href="#">Partners</a></dd>
                        <dd role="menuitem">{{HTML::decode(HTML::linkRoute('privacy', 'Privacy Policy')) }}</dd>
                        <dd role="menuitem">{{HTML::decode(HTML::linkRoute('legal', 'Terms &amp; Conditions')) }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</footer>




<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/foundation/foundation.topbar.js"></script>
<script>
    var globals = { 'payment_target':'catchable','amt':1,'transcost':0,'total':0,'orderAmt':1,'curren':"" };
    var myDataArray  = new Object;
    $(document).foundation();
    $(document).ready(function(){
        var baseUrl = "http://localhost/c3exchange/public/"
        $(".ecurrency").on("change",function(){
            var otype   = $("#order_type").val()
            if(otype !="Exchange"){
                var $method = $(this).val()
                var $curr   = $method.split(" ")

                globals.curren = $curr[1];
                var urlparam =$curr[0]+7+otype //this needed backend ajax
                var orderamount = $("#order_amount").val();
                $.ajax({
                    url:"home/"+urlparam,
                    type:"post",
                    data:{input:$curr[0]},
                    success: function(result){
                        //alert(result)
                        $.each( result, function( key, value ) {
                            myDataArray[key]  = value ;
                        });
                        $("#destTxt").html("<strong>"+$curr[0]+" <i>("+$curr[1]+")</i></strong>")

                        globals.amt =myDataArray[1]
                        treatNumeric(orderamount,globals.amt)
                        globals.payment_target =myDataArray[0] //get the ecurrency from index

                        if(otype == "Buy"){
                            globals.total = eval(javaCeil(parseInt(globals.orderAmt)/parseInt(globals.amt),2))
                            $("#FINAL_AMOUNT").val(globals.total)
                        }else if(otype=="Sell"){
                            globals.total = eval(javaCeil(parseInt(globals.orderAmt)*parseInt(globals.amt),2))
                            $("#FINAL_AMOUNT").html("<span class='alert-box success' style='display:inline'><h4 style='display:inline; color:#fff !important'><strong>"+ globals.total +" "+ $("#method_id").val()+ " <i></i></strong></h4></span>")
                        }
                        $("#total_amount").val(globals.total)
                        $("#final_amount").val(globals.total)
                        $("#offer_amount").val(globals.amt)
                    }
                })
            }else if(otype =="Exchange"){
                var $method = $("#ecurrency").val()
                var $curr   = $method.split(" ")
                var excurr  = $("#exchange_transfer").val()
                excurr      = excurr.split(" ")
                globals.curren = $curr[1];
                var urlparam =$curr[0]+"©"+$curr[1]+"©"+$curr[2] //this needed backend ajax
                var urlparam2 = excurr[0]+"©"+excurr[1]+"©"+excurr[2]
                var orderamount = $("#order_amount").val();
                var request = $.ajax({
                    url:"exchange",
                    type:"post",
                    data:{input1:urlparam,input2:urlparam2},
                    dataType:"json"
                })

                request.done(function(data){
                    //alert(JSON.stringify(data))
                    var splexchange = data["exchange"].split(":")
                    var currpair    = data["currency_pair"].split("_") //splexchange[2]
                    /*$.each( JSON.stringify(data), function( key, value ) {
                     myDataArray[key]  = value ;

                     success: function(JSONObject) {
                     var peopleHTML = "";

                     // Loop through Object and create peopleHTML
                     for (var key in JSONObject) {
                     if (JSONObject.hasOwnProperty(key)) {
                     peopleHTML += "<tr>";
                     peopleHTML += "<td>" + JSONObject[key]["name"] + "</td>";
                     peopleHTML += "<td>" + JSONObject[key]["gender"] + "</td>";
                     peopleHTML += "</tr>";
                     }
                     }
                     });*/

                    $("#destTxt").html("<strong> <i>("+$curr[1]+")</i></strong>")
                    $("#excdetail").html("<div class='large-6 columns right'>" +
                        "<h5>Exchange Rate</h5> " +
                        "<div><strong><i>"+splexchange[0]+" "+currpair[0]+" = "+splexchange[1]+" "+currpair[1]+
                        "</i></strong></div></div>")
                    globals.amt = splexchange[1]
                    treatNumeric(orderamount,globals.amt)


                    globals.total = eval(parseFloat(globals.orderAmt)*parseFloat(globals.amt))
                    $("#FINAL_AMOUNT").html(globals.total)
                    console.log(globals.total)
                    $("#total_amount").val(globals.total)
                    $("#final_amount").val(globals.total)
                    $("#offer_amount").val(globals.amt)


                })

                request.fail(function(){
                    alert("Request: failed")
                })

            }
        })





    $("#order_amount").on("keypress",function(evt){
        return isNumberKey(evt)
    })
    $("#order_amount").on("change",function(evt){
        treatNumeric($(this).val(),globals.amt)
        var otype = $("#order_type").val()
        if(otype == "Buy"){
            globals.total = eval(parseInt(globals.orderAmt)/parseInt(globals.amt))
            $("#FINAL_AMOUNT").val(globals.total)

        }else if(otype=="Sell"){
            globals.total = eval(parseInt(globals.orderAmt)*parseInt(globals.amt))
            $("#FINAL_AMOUNT").html("<span class='alert-box success' style='display:inline'><h4 style='display:inline; color:#fff !important'><strong>"+ globals.total +" "+ $("#method_id").val()+ " <i></i></strong></h4></span>")
        }else if(otype="Exchange"){
            globals.total = eval(parseFloat(globals.orderAmt)*parseFloat(globals.amt))
            $("#FINAL_AMOUNT").html(parseFloat(globals.total))
        }
        $("#total_amount").val(globals.total)
        $("#final_amount").val(globals.total)
        $("#offer_amount").val(globals.amt)
    })
    })
    /*
    * treatNumeric is a function to make sure
    * that order amount and currency amount is
    * not set to zero or is not a numeric value
    *
    * this method is to be called to for the
    * ecurrency sell and buy dropdowns
    * */
    function treatNumeric(orderamt,curramt){

        //this orderamt field is to get the user order or offer
        //input for both sell and buy
        if(orderamt==0 || isNaN(orderamt)){
            globals.orderAmt = 1
        }else{
            globals.orderAmt = orderamt
        }
        //this curramt field is to get the currency exchange rate through ajax
        //for both sell and buy
        if(curramt==0 || isNaN(curramt)){
            globals.amt = 1
        }else{
            globals.amt = curramt
        }
    }

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function javaCeil(str, precision) {
        return str.toFixed(precision)
    }
</script>
</body>
</html>
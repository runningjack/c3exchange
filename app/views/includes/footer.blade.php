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
                    <p></p>
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
                    <p> © 2014 All Rights reserved by <a href="#">C3G EXCHANGE.</a></p>
                </div>
                <div class="large-5 columns">
                    <dl class="sub-nav" role="menu" title="Filter Menu List">


                        <dd role="menuitem"><a href="#">Partners</a></dd>
                        <dd role="menuitem"><a href="#">Privacy Policy</a></dd>
                        <dd role="menuitem"><a href="#">Terms &amp; Conditions</a></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</footer>




<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
    $(document).ready(function(){
        var globals = { 'payment_target':'catchable','amt':0,'transcost':0,'total':0,'mReport':0,'curren':"" };

        var baseUrl = "http://localhost/c3exchange/public/"
        $("#cid").on("change",function(){

            var $method = $(this).val()
            var $curr   = $method.split(" ")
            var otype   = $("#order_type").val()
            globals.curren = $curr[1];
            var urllink =$curr[0]+7+otype
            console.log(urllink)
            $.ajax({
                url:"home/"+urllink,
                type:"post",
                data:{input:$curr[0]},
                success: function(result){
                    var myDataArray  = new Object;

                    $.each( result, function( key, value ) {
                        myDataArray[key]  = value ;
                    });
                    $("#destTxt").html("<strong>"+$curr[0]+" <i>("+$curr[1]+")</i></strong>")
                    var orderamount = $("#order_amount").val();
                    globals.amt =myDataArray[1]
                    globals.payment_target =myDataArray[0]
                    if(otype == "Buy"){
                        $("#FINAL_AMOUNT").val(javaCeil(parseInt(orderamount)/parseInt(globals.amt),2))
                    }else if(otype=="Sell"){
                        $("#FINAL_AMOUNT").html("<span class='alert-box success' style='display:inline'><h4 style='display:inline; color:#fff !important'><strong>"+javaCeil(parseInt(orderamount)/parseInt(globals.amt),2)+" "+ globals.payment_target+ " <i>("+$curr[1] +")</i></strong></h4></span>")
                    }
                }
            })
        })

        $("#order_amount").on("keypress",function(evt){
            return isNumberKey(evt)
            var orderamount = $(this).val();
            $("#FINAL_AMOUNT").val(javaCeil(parseInt(orderamount)/parseInt(globals.amt),2))
        })//currency_account
        $("#order_amount").on("blur",function(evt){
            //return isNumberKey(evt)
            var orderamount = $(this).val();
            var otype = $("#order_type").val()
            if(otype == "Buy"){
                $("#FINAL_AMOUNT").val(javaCeil(parseInt(orderamount)/parseInt(globals.amt),2))
            }else if(otype=="Sell"){
                $("#FINAL_AMOUNT").html("<span class='alert-box success' style='display:inline'><h4 style='display:inline; color:#fff !important'><strong>"+javaCeil(parseInt(orderamount)/parseInt(globals.amt),2)+" "+ globals.payment_target+ " <i>("+ globals.curren+")</i></strong></h4></span>")
            }
        })

    })

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
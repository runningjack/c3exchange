<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 9:19 AM
 */

?>
<div class="sideHeading firstTop">
    <h4 >Quick Menu</h4>
    <div id="alertme"></div>
</div>
<div class="sideContent">
    <ul class="side-nav">
        <li>{{ HTML::link('account/home', 'My Account Home' ) }}</li>
        <li>{{ HTML::link('account/profile', 'Profile' ) }}</li>
        <li>{{ HTML::link('account/orders', 'My Orders' ) }}</li>
        <li>{{ HTML::link('account/changepass', 'Change Password' ) }}</li>
        <li>{{ HTML::link('logout', 'Logout' ) }}</li>

    </ul>
</div>
@if(!Auth::check())
<div class="sideHeading">
    <h4 >Member Area</h4>
    <div id="alertme"></div>
</div>
<div class="sideContent">
    <form action="" method="post" enctype="multipart/form-data" name="frmpriviledge"  id="frmpriviledge" >

        <label for="username" >username

            <input type="text" placeholder="username" required="required" name="username" id="username" value="" /></label>



        <label for="password">password
            <input type="password" placeholder="Enter your password" class="six" required="required" name="password" id="password" value="" /></label>

        <a href="#" class="button offset-by-one" name="login" id="login">Login</a>


    </form>

    <span><a href="#">Request password</a></span><br /><span>new user?<a href="#">Register</a></span>

</div><!--end of sidebar-->
@endif

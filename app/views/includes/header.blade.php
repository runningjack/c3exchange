<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/5/14
 * Time: 9:19 AM
 */
?>

<header>
    <div class="row">
        <div class="large-6 columns">
            <div style="padding: 10px 0;">{{HTML::decode(HTML::linkRoute('home', '<img src="img/logo.png">')) }}</div>
        </div>
        <div class="large-6 columns">
            <dl class="sub-nav" role="menu" title="Filter Menu List">
                <dd role="menuitem"><a href="register">Register</a></dd>
                <dd role="menuitem"><a href="login">Login</a></dd>
                <dd role="menuitem">{{HTML::decode(HTML::linkRoute('legal', 'Terms &amp; Conditions')) }}</dd>
            </dl>
        </div>
    </div>
</header>
<nav class="top-bar" data-topbar role="navigation">

    <ul class="title-area">
        <li class="name">
            <h1>{{HTML::decode(HTML::linkRoute('home','<span class="fa fa-home"></span>'))}} </h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>


    <!-- Left Nav Section -->
    <section class="top-bar-section">
        <ul class="right">
            <li class="active"><a href="about">About C3G Exchange</a> </li>
            <li><a href="buy">Buy</a> </li>
            <li><a href="sell">Sell</a> </li>
            <li><a href="legal">Terms of Services</a> </li>
            <li>{{HTML::linkRoute("faq","FAQ")}} </li>
            <li><a href="contact">Contact Us</a> </li>
        </ul>
    </section>
</nav>

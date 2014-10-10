<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/9/14
 * Time: 4:50 PM
 */ ?>

<!DOCTYPE html>
<html>
<head>
@include('includes.head2')
</head>
<body>
@include('includes.headeraccount')
<div class="row">
    <div class="large-3 columns">
        @include("includes.sidebaraccount")
    </div>

    <div class="large-9 columns">
        @yield('content')
    </div>

</div>
@include('includes.footer')
</body>
</html>
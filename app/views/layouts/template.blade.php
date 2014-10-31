<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 10/6/14
 * Time: 11:28 PM
 */?>

<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
@include('includes.header')
<div class="row">
    <div class="large-3 columns">
        @yield("reserve")

        @include("includes.sidebar")
    </div>

    <div class="large-9 columns">
        @yield('content')
    </div>

</div>
@include('includes.footer')
</body>
</html>
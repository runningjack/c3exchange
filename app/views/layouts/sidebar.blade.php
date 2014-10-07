<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
@include('includes.header')
@include('includes.slider')
<div class="row">
    <div class="large-9 columns">
        @yield('content')
    </div>
    <div class="large-3 columns">
        @include("includes.sidebar")
    </div>

</div>
    @include('includes.footer')
</body>
</html>
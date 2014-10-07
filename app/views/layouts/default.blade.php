<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
        @include('includes.header')
        @include('includes.slider')
    <div class="row">
        @yield('content')
    </div>
        @include('includes.footer')
</body>
</html>
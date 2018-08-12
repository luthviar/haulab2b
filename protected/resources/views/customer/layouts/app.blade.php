<!doctype html>
<html lang="en">
<head>
    @include('customer.layouts.head')
    @yield('new-css')
</head>

<body>
    @include('customer.layouts.navbar')

    @yield('content')

    @include('customer.layouts.footer')

    @include('customer.layouts.scripts')

    @yield('new-scripts')
</body>

</html>
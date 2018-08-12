<!doctype html>
<html lang="en">
<head>
    @include('customer.layouts.head')
</head>

<body>
    @yield('content')

    @include('customer.layouts.footer')

    @include('customer.layouts.scripts')

    @yield('new-scripts')
</body>

</html>
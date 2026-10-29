<!DOCTYPE html>
<html lang="en">
<head>
    @include('site._partial.metahead')
    @include('site._partial.stylesheet')
    @stack('styles')
    @stack('schema-scripts')
</head>
<body class="@yield('body_class')">
    @include('site._partial.topbar')
    @include('site._partial.header')

    @yield('content')

    @include('site._partial.footer')
    @include('site._partial.modals')

    <script src="{{ asset('assets/js/data.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
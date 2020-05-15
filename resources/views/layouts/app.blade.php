<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="icon" href="assets/icons/icon.png" type="image/png" sizes="54x54">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>{{__('texts.app_name')}}</title>

        <!-- include css -->
        <link rel="stylesheet" type="text/css" href="assets/bootstrap/4.4.1/css/bootstrap.min.css">
        @stack('styles')

        <!-- include scripts -->
        <script src="assets/js/jquery/3.5.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="assets/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
    </head>
    
    <body>
        @yield('content')
        @stack('scripts')
    </body>
</html>
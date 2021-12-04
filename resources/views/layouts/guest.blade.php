<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed font-sans antialiased sidebar-collapse">
    <div class="wrapper">
        @include('layouts.navigation')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if (isset($header))
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <h1>{{ $header }}</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
            @endif

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            {{ $slot }}
                        </div>

                        @if (isset($aside))
                            <div class="col-lg-3">
                                {{ $aside }}
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.footer')
    </div>

    @stack('scripts')
</body>

</html>

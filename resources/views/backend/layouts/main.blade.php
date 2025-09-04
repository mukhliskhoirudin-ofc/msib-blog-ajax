<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel - @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css') }}" />

    {{-- cdn css datatable --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">

    {{-- cdn animate css sweetalert2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    @stack('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('backend.partials.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper d-flex flex-column min-vh-100">
            <!--  Header Start -->
            @include('backend.partials.header')
            <!--  Header End -->

            <div class="container-fluid">
                {{-- Content Start --}}
                @yield('content')
                {{-- Content End --}}
            </div>

            <!-- Footer -->
            <footer class="mt-auto mb-2">
                @include('backend.partials.footer')
            </footer>
        </div>
    </div>
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>

    {{-- cdn js datatable --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js"></script>

    {{-- cdn js sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')
</body>

</html>

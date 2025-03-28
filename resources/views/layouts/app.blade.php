<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiReview - Seleksi Internal PKM</title>


    <!-- Stylesheets -->
    @include('include.style')
</head>

<body>
    <div id="app">
        <div class="sidebar-menu">
        @include('include.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('include.navbar')
            <section class="section">
                <!-- Main Content -->

                @yield('content')
            </section>
        </div>
    </div>

    <!-- Scripts -->
    @include('include.script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#paguTable').DataTable();
        });
    </script>
</body>

</html>

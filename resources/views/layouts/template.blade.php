<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    @stack('csslib')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    @stack('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('components.navbar')

            @include('components.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <div class="section-header-back">
                            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <h1>{{ $title }}</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Posts</a></div>
                            <div class="breadcrumb-item">Create New Post</div>
                        </div>
                    </div>

                    @yield('content')

                </section>
            </div>

            @include('components.footer')
        </div>
    </div>

    <form action="{{ route('logout') }}" method="post" id="form_logout">
        @csrf
    </form>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    @stack('jslib')

    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @stack('js')

    @if (session()->has('success'))
        <script>
            swal("Success", "{{ session('success') }}", 'success');
        </script>
    @elseif(session()->has('error'))
        <script>
            swal("Error", "{{ session('error') }}", 'error');
        </script>
    @endif

    <script>
        function logout_() {
            swal({
                    title: 'Are you sure?',
                    text: 'Logout?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#form_logout').submit();
                    }
                });
        }
    </script>
</body>

</html>

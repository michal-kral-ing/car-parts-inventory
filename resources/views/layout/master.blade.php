<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>Car Parts Management</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font_awesome_5_free.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <script src="{{ asset('dist/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @auth
                @include('layout.sidebar')
            @endauth
            @yield('main_content')
        </div>
    </div>

    <script src="{{ asset('dist/js/custom.js') }}"></script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.show({
                    message: '{{ $error }}',
                    position: 'topRight',
                    color: 'red',
                    icon: 'fa fa-times',
                    title: 'Error',
                });
            </script>
        @endforeach
    @endif

    @if (session('success'))
        <script>
            iziToast.show({
                message: '{{ session('success') }}',
                position: 'topRight',
                color: 'green',
                icon: 'fa fa-check',
                title: 'Success',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            iziToast.show({
                message: '{{ session('error') }}',
                position: 'topRight',
                color: 'red',
                icon: 'fa fa-times',
                title: 'Error',
            });
        </script>
    @endif

</body>

</html>

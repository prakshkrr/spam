<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Add css file-->
    <link rel="stylesheet" type="text/css" href="{{ url('css/spam_word_checker.css') }}">


    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    @include('layout.header')
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
          @include('layout.sidebar')
        <div class="content-wrapper">

            {{-- word page --}}
            <div class="container">
              @yield('word_content')
            </div>

            {{-- category page --}}
            <div class="container">
              @yield('category_content')
            </div>

            {{-- dashboard page --}}
            <div class="container">
                @yield('content_dashboard_admin_user')
            </div>
        </div>
        
          @include('layout.footer')
     </div>
    <!-- Add js file -->
    {{-- <script src="{{ url('js/Spam_checker_main_js_all_words.js') }}"></script> --}}
</body>

</html>

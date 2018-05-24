<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('backend/img/apple-icon.png')}}">
    <link rel="icon" href="{{asset('backend/img/favicon.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('backend/css/material-dashboard.css?v=2.0.0')}}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>
<body>
    <div id="app">
        @if(Request::is('admin*'))
@include('layouts.partial.sidebar')
        @endif
        <div class="main-panel">
        @if(Request::is('admin*'))
@include('layouts.partial.topbar')
        @endif
@yield('content')  

      @if(Request::is('admin*'))
@include('layouts.partial.footer')
      @endif
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap-material-design.js') }}"></script>
<script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset('backend/js/plugins/chartist.min.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('backend/js/plugins/arrive.min.js') }}" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{ asset('backend/js/material-dashboard.js?v=2.0.0') }}"></script>
<!-- demo init -->
<script src="{{ asset('backend/js/plugins/demo.js') }}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script>
        @if ($errors->any())
    @foreach ($errors->all() as $error)
  
           toastr.error('{{ $error }}');
    @endforeach
@endif

@if (session('status'))    
 toastr.success('{{ session('status') }}')
@endif

       </script>
   {!! Toastr::message() !!}

<script type="text/javascript">
    $(document).ready(function() {

        //init wizard

        // demo.initMaterialWizard();

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initCharts();

    });
</script>
@stack('scripts')
</html>

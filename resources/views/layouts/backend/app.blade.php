<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Customer Management System | {{ $titlePage ?? '' }}</title>

    <!-- ============================ Styles =============================== -->

        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

	    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	    <!-- Styles -->
        <link href="{{ asset('assets/backend/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        {{-- Toastr --}}
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />


</head>

    <body>
        <div class="wrapper">

            @include('layouts.backend.includes.sidebar')

            <div class="main">

                @include('layouts.backend.includes.navbar')

                <main class="content">
                    @yield('content')
                </main>


            </div>
        </div>


         {{-- ==================== Scripts =================== --}}

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


        {{-- Toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- Popper js --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- Bootstrap js --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        {{-- Datatable --}}

        <script
            src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet"
            href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        {{-- sweet alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- system js --}}
        <script src="{{ asset('assets/backend/js/app.js') }}" defer></script>
        <script src="{{ asset('assets/backend/js/custom.js') }}" defer></script>


        @if(session('success'))
            <script type="text/javascript">
                toastr.success('{{session("success")}}', 'Success!');
            </script>
        @endif

        @if(session('error'))
            <script type="text/javascript">
                toastr.error('{{session("error")}}', 'Error!');
            </script>
        @endif

        @if(session('warning'))
            <script type="text/javascript">
                toastr.warning('{{session("warning")}}', 'Warning!');
            </script>
        @endif

        @if(session('info'))
            <script type="text/javascript">
                toastr.info('{{session("info")}}', 'Info!');
            </script>
        @endif


    </body>

</html>

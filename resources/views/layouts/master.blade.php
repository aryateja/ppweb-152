<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Northwind Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sticky-footer-navbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">PPWeb 152</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('category') }}">Kategori</a></li>
                        <li><a href="{{ url('product') }}">Produk</a></li>
                        <li><a href="{{ url('employee') }}">Karyawan</a></li>
                        <li><a href="{{ url('supplier') }}">Pemasok</a></li>
                        <li><a href="{{ url('customer') }}">Pelanggan</a></li>
                        <li><a href="{{ url('shipper') }}">Kurir</a></li>
                        <li><a href="{{ url('order') }}">Pemesanan</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if (session('pesan_sukses'))
                @include('_alert.success')
            @endif

            @if (session('pesan_gagal'))
                @include('_alert.failed')
            @endif

            @yield('konten')
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">&copy; {{ \Carbon\Carbon::now()->year }}. Rachmat Kukuh Rahadiansyah.</p>
            </div>
        </footer>

        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    </body>
</html>
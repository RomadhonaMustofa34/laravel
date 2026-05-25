<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Kendaraan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        body{
            background:#f5f6fa;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:#1e293b;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:8px;
            margin-bottom:5px;
        }

        .sidebar a:hover{
            background:#334155;
        }

        .content{
            flex:1;
            padding:20px;
        }

    </style>

</head>

<body>

<div class="d-flex">

    <div class="sidebar p-3">

        <h4 class="text-white mb-4">
            Fleet System
        </h4>

        <a href="/dashboard">
            <i class="fa fa-chart-line"></i>
            Dashboard
        </a>

        <a href="/vehicles">
            <i class="fa fa-truck"></i>
            Kendaraan
        </a>

        <a href="/drivers">
            <i class="fa fa-user"></i>
            Driver
        </a>

        <a href="/bookings">
            <i class="fa fa-calendar"></i>
            Booking
        </a>

        <a href="/approvals">
            <i class="fa fa-check"></i>
            Approval
        </a>

    </div>

    <div class="content">

        <div class="d-flex justify-content-between mb-4">

            <h4>
                Sistem Peminjaman Kendaraan
            </h4>

            <div>

                {{ auth()->user()->name }}

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Logout
                    </button>

                </form>

            </div>

        </div>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @yield('content')

    </div>

</div>

</body>
</html>
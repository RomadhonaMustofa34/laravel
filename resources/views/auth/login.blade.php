<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#f1f5f9;
        }

        .login-box{
            width:400px;
            margin:auto;
            margin-top:100px;
        }

    </style>

</head>

<body>

<div class="login-box">

    <div class="card shadow border-0">

        <div class="card-body p-4">

            <div class="text-center mb-4">

                <h3>
                    Fleet Management
                </h3>

                <p class="text-muted">
                    Login Sistem Kendaraan
                </p>

            </div>

            @if($errors->any())

                <div class="alert alert-danger">

                    {{ $errors->first() }}

                </div>

            @endif

            <form action="{{ route('login.post') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <button class="btn btn-primary w-100">

                    Login

                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>
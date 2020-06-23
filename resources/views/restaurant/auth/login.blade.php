<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Restaurant Admin</title>
    <link rel="shortcut icon" href="{{ asset('asset/front/img/logo.png') }} - favicon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('asset/front/css/style.css') }}">
    <!-- google-font css -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,800|Roboto:400,500,700&display=swap"
          rel="stylesheet">
</head>
<body>

<section class="login-res-admin">
    <div class="full-login">
        <div class="logo">
            <img src="{{ asset('asset/front/img/logo.png') }}" alt="">
            <h5>Login to Restaurant Admin Account</h5>
        </div>
        <form action="{{ url('/restaurant/login') }}" method="post">
            @method('post')
            {{ csrf_field() }}
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter password">
            </div>
            <button type="submit" class="form-control submit-btn">Submit</button>
        </form>
        @if ($errors->has('email'))

            <span class="help-block text-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            <br>
        @endif
        @if ($errors->has('password'))
            <span class="help-block text-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            <br>
        @endif

        <a href="#">Forgot password?</a>
    </div>
</section>


<!-- js for bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- custom js -->
<script>
    function showSearch() {
        document.getElementById("hidden-search-bar").style.display = "block";
    }

    function hideSearch() {
        document.getElementById("hidden-search-bar").style.display = "none";
    }
</script>
</body>
</html>

<html>
<head>
    <title>Custom Authentication</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <h3>Login</h3>
            @if ($errors->any())
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            @endif
            <hr>
            <form action="loginUser" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                {{csrf_field()}}
                <div class="mb-3 form-group">
                    <label>Email</label>
                    <input type="Email" class="form-control" name="email" placeholder="Enter Your Email" value={{old('email')}}>
                </div>
                <div class="mb-3 form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" value={{old('password')}}>
                </div>
                <div class="mb-3 form-group">
                    <input class="btn btn-block btn-primary" type="submit" value="Login">
                </div>
            </form>
            <a href="register">New User ?? Register here</a>

        </div>
    </div>
</div>

</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>
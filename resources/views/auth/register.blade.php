
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
                <h3>Registration</h3>
                @if($errors->any())
                    @foreach ($errors->all() as $err)
                         <li>{{$err}}</li>
                    @endforeach
                @endif
                <hr>
                <form action="register" method="POST">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                    {{csrf_field()}}
                    <div class="mb-3 form-group">
                        <label>Fullname</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value={{old('name')}}>
                    </div>
                    <div class="mb-3 form-group">
                        <label>Email</label>
                        <input type="Email" class="form-control" name="email" placeholder="Enter Your Email" value={{old('email')}}>
                    </div>
                    <div class="mb-3 form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password">

                    </div>
                    <div class="mb-3 form-group">
                        <input class="btn btn-block btn-primary" type="submit" value="Register">
                    </div>
                </form>
                <br>
                <a href="login">Already Register ?? Login here</a>
            </div>
        </div>
    </div>

</body>

</html>


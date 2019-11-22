@include('header')
<html>
    <body>
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <div>
                        <h3> Login here.. </h3>
                    </div>
                    <form method="post" action="login/post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
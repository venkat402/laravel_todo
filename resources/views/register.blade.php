<html>
    <header>
        <link rel="stylesheet" href="/css/app.css">

    </header>
    <body>
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <div>
                        <h3> Register here.. </h3>
                    </div>
                    <form method="post" action="register/create">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter your name">
                        </div>
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
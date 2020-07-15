<?php
if(isset($_POST['username']))
    $user = $_POST['username'];
if(isset($_POST['password']))
    $pass = $_POST['password'];



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<!-- Just an image -->
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top"
            alt="" loading="lazy">
        poo_validation
    </a>
</nav>

<body>
    <div class="row my-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Let's Login Challenge!</h1>


            <form action="index.php" method="post">
            <!--
              debug
                user::admin
                pass::password12345698910

              -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" maxlength=10>
                    <small id="emailHelp" class="form-text text-muted">
                        max-length=10
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

          <?php
            if(isset($user)&&isset($pass))
            {
              $admin_user="admin";
              $admin_pass="password12345678910";
            

              if(hash_equals($admin_user,$user)&&hash_equals($admin_pass,$pass))
                echo "<script>alert(\"clpwn{only_frontend_validation_is_not_complete}\");</script>";
            }
            


            ?>

        </div>
        <div class="col-md-2"></div>




















        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
</body>

</html>
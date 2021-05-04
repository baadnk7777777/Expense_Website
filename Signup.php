<?php 
    session_start();
    include_once('command/config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>DashBoard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2b7bd13048.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light light-blue lighten-4" id="nav-bee">

            <a class="navbar-brand" href="#">
                <h3>Expenses Manager</h3>
            </a>

        </nav>


        <div class="row" id="background">
            <div class="col">
                <div class="col mt-5 sign bg-white" style="height: auto">
                    <div class="content">
                        <div class="row">
                            <div class="col mt-5">
                                SignUp
                                <form id="Signup" method="POST">

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="txt_us"
                                            required>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" placeholder="Fullname" name="txt_fn"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" placeholder="Lastname" name="txt_ln"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="txt_em"
                                            required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="Password" class="form-control" name="txt_ps"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Role</label>
                                            <select class="form-control" name="txt_role" required>
                                                <option selected>Choose...</option>
                                                <option value="children">Children</option>
                                                <option value="parent">Parent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                            <label class="form-check-label" for="gridCheck">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                </form>
                            </div>
                            <div class="col ml-5 mt-5">
                                <!-- <img src="image/wall1.jpg" alt="" width="100%"> -->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="image/wall1.jpg" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="..." alt="Second slide">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning" role="alert">
                    If You have account Click Here <a href="Login.php" class="alert-link">Login</a> .
                </div>

            </div>

        </div>

    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
    $(function() {
        $("#Signup").submit(function() {
            console.log("Hello");
            event.preventDefault();
            $.ajax({
                url: "command/signup.php",
                type: "post",
                data: $("form#Signup").serialize(),
                success: function(data) {
                    console.log(data);
                    alert(data);
                    location.reload();
                },
                error: function(data) {
                    console.log("An error accured." + data);
                }
            });
        });
    });
    </script>
</body>

</html>
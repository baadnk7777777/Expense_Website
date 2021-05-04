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
                            Login
                            <form id="login" method="POST">


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="txt_em" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>Password</label>
                                        <input type="Password" class="form-control" name="txt_ps" placeholder="Password"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                    <p id="text"></p>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Sign in</button>
                            </form>
                            </div>
                            <div class="col ml-5 mt-5">
                                <img src="image/wall1.jpg" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning" role="alert">
                   If You Dont'have account  Click Here <a href="Signup.php" class="alert-link">Signup</a> .
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
    $("#login").submit(function() {
        event.preventDefault();
        $.ajax({
            url: "command/login.php",
            type: "post",
            data: $("form#login").serialize(),
            success: function(data) {
                console.log(data);

                if (data == "ok") {
                    window.location.href = 'welcome.php';

                } else {
                    $('#text').html(
                        "<p class='text-danger' id='text'>Invalid usernmae or password</p>")

                }
                //window.location.href = 'dashboard.php';
            },
            error: function(data) {
                console.log("An error accured." + data);
                //location.reload();
            }
        });
    });
    </script>
</body>

</html>
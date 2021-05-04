<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Expense Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


</head>

<body>
    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-2">
                <div class="side-bar">
                    <p style="font-size: 14.9px;">Expense Website</p>
                    <img src="image/profile.jpg" alt="" width="50%">
                    <hr>
                    <p style="font-size: 14.9px;">Fullname</p>
                    <p style="font-size: 14.9px;">Role</p>
                    <p style="font-size: 11px;">Online</p>
                    <hr>
                    <p style="font-size: 14.9px;">General</p>
                    <a href="Login.php" style="font-size: 14.9px;">Login</a>
                    <br>
                    <a href="Signup.php" style="font-size: 14.9px;">Signup</a>

                </div>
            </div>


            <div class="col mt-5 sign">
                <div class="content">
                    <div class="row">
                        <div class="col">
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
                        <div class="col ml-5">
                            <img src="image/wall1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
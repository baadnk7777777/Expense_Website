<?php 
    session_start();
?>

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
    <script src="https://kit.fontawesome.com/2b7bd13048.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-2">
                <div class="side-bar">
                    <p style="font-size: 14.9px;">Expense Website</p>
                    <img src="image/profile.jpg" alt="" width="50%">
                    <hr>
                    <p style="font-size: 14.9px;"><?php echo $_SESSION['name'] ?></p>
                    <p style="font-size: 14.9px;"><?php echo $_SESSION['role'] ?></p>
                    <p style="font-size: 12px;"><i class="fas fa-globe-asia" style="color: green;"></i> Online</p>
                    <hr>
                    <p style="font-size: 14.9px;">General</p>
                    <a href="dashboard.php" style="font-size: 14.9px;">DashBoard</a>
                    <br>
                    <a href="expenses.php" style="font-size: 14.9px;">Expenses</a>
                    <br>
                    <a href="Logout.php" style="font-size: 14.9px;">Logout</a>

                </div>
            </div>


            <div class="col mt-5 content">
                <form action="" method="POST" id="expenses">
                    <div class="form-group row">
                        <div class="form-col-6">
                            <input type="text" class="form-control" placeholder="Cost Item" name="txt_cost" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-col-6">
                            <select class="custom-select" name="txt_cate" required>
                                <option selected>Category ...</option>
                                <option value="food">Food</option>
                                <option value="transportation">transportation</option>
                                <option value="clothing">Clothing</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="cosmetics">Cosmetics</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-col-6">
                            <input type="text" class="form-control" name="date" Placeholder="Date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control col-4" id="exampleFormControlTextarea1" name="txt_area"
                            rows="3"></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-12">
                            <input type="file" id="uploadimage" name="image">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </form>
            </div>
        </div>
       
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function(e) {
        $('[name="date"]')
            .datepicker({
                format: 'yyyy/mm/dd'
            })
            .on('changeDate', function(e) {
                // do somwthing here
            });
    });

    $(function() {
        $("#expenses").submit(function(e) {
            e.preventDefault();
            console.log("Hello");
            event.preventDefault();
            $.ajax({
                url: "command/insert_expense.php",
                type: "post",
                data: $("form#expenses").serialize(),
                success: function(data) {
                    console.log(data);
                    alert("Expense Success!");
                    //$('.alert').alert()
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
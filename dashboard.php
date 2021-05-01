<?php 
    session_start();
    include_once('command/config.php');
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
                    <p style="font-size: 12px;"><i class="fas fa-globe-asia"  style="color: green;"></i> Online</p>
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
                <div class="row">
                    <div class="col">
                        <div class="total-Balance p-3 mb-2 bg-primary text-white">
                            <p class="text-center">Total-Balance</p>
                            <?php 
                                $sql = "Select * FROM children_detail WHERE user_id = :user_id";
                                $query = $db->prepare($sql);
                                $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                $user_id = $_SESSION['user_id'];
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_OBJ);
                                    if($query->rowCount() >0) {
                                        foreach($result as $res)
                                        {   
                            ?>
                            <p class="text-center"> <?php echo $res->balance ?></p>

                        </div>
                    </div>
                    <div class="col">
                        <div class="total-expense p-3 mb-2 bg-success text-white">
                            <p class="text-center">Total-Expense</p>
                            <?php 
                                $sql = "Select sum(cost) as total_cost FROM expenses WHERE children_id = :children_id";
                                $query = $db->prepare($sql);
                                $query->bindParam(':children_id', $children_id, PDO::PARAM_STR);
                                $children_id = $_SESSION['user_id'];
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_OBJ);
                                    if($query->rowCount() >0) {
                                        foreach($result as $res1)
                                        {   
                            ?>
                            <p class="text-center"> <?php echo $res1->total_cost ?></p>
                        </div>
                        <?php 
                            }
                        }?>
                    </div>
                    <div class="col">
                        <div class="yesterday p-3 mb-2 bg-success text-white">
                            <p class="text-center">Yesterday</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="last-week-day p-3 mb-2 bg-success text-white">
                            <p class="text-center">Last 7 Day</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="last-month-day p-3 mb-2 bg-primary text-white">
                            <p class="text-center">Last 30 Day</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 mb-2 bg-warning text-dark"></div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
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

    </script>

</body>

</html>
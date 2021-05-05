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
        <nav class="navbar navbar-light light-blue lighten-4" id="nav-be">

            <a class="navbar-brand" href="#">
                <h3>Expenses Manager</h3>
            </a>

            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
                aria-label="Toggle navigation"><span class="dark-blue-text"><i
                        class="fas fa-bars fa-1x"></i></span></button>

            <?php 
                   if($_SESSION['role'] == "parent")
                    {
                ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="expenses.php">Expenses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="expenses_report.php">Expenses Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaction.php">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaction_report.php">Transactions Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="setting.php">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <?php 
                    }else {

            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="expenses.php">Expenses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaction.php">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <?php }?>

        </nav>


        <div class="row" id="background">

            <div class="col-2" id="sidebar-menu">
                <div class="d-flex justify-content-center mt-5">
                    <h3>Expense manager</h3>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <p>General</p>
                </div>
                <hr>
                <?php 
                   if($_SESSION['role'] == "parent")
                    {
                ?>
                <div class="nonburger">
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-chart-line mr-4"></i> <a href="dashboard.php"
                            style="color: #181A1B;">DashBoard</a><i class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center " id="sidebar"><i
                            class="fab fa-bitcoin mr-4"></i><a href="expenses.php"
                            style="color: #181A1B;">Expenses</a><i class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-clipboard-list mr-4"></i><a href="expenses_report.php"
                            style="color: #181A1B;">Expenses Report</a><i class="fas fa-chevron-right ml-auto"></i>
                    </div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-exchange-alt mr-4"></i><a href="transaction.php"
                            style="color: #181A1B;">Transactions</a><i class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-clipboard-list mr-4"></i><a href="transaction_report.php"
                            style="color: #181A1B;">Transactions Report</a><i class="fas fa-chevron-right ml-auto"></i>
                    </div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-cogs mr-4"></i><a href="setting.php" style="color: #181A1B;">Setting</a><i
                            class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-sign-out-alt mr-4"></i><a href="Logout.php"
                            style="color: #181A1B;">Logout</a><i class="fas fa-chevron-right ml-auto"></i></div>
                </div>
                <?php 
                }else{
                    ?>
                <div class="nonburger">
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-chart-line mr-4"></i> <a href="dashboard.php"
                            style="color: #181A1B;">DashBoard</a><i class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center " id="sidebar"><i
                            class="fab fa-bitcoin mr-4"></i><a href="expenses.php"
                            style="color: #181A1B;">Expenses</a><i class="fas fa-chevron-right ml-auto"></i></div>
                    <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i
                            class="fas fa-sign-out-alt mr-4"></i><a href="Logout.php"
                            style="color: #181A1B;">Logout</a><i class="fas fa-chevron-right ml-auto"></i></div>
                </div>
                <?php }?>
            </div>
            <div class="col">

                <nav class="navbar navbar-expand-lg navbar-light navback mt-4">
                    <img src="image/user-1.png" alt="profile" width="3%">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto ">

                            <li class="nav-item ml-3 mt-3">
                                <p class="text-uppercase" style="font-size: 20px "><?php echo $_SESSION['name']?></p>
                            </li>

                            <li class="nav-item ml-3 mt-3">
                                <p class="text-uppercase" style="font-size: 20px"><?php echo $_SESSION['role']?></p>
                            </li>

                            <li class="nav-item ml-3 mt-4">
                            <a href="profile.php"><i class="fas fa-cog" style="font-size: 20px"></i></a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

                <div class="row">
                    <div class="col mt-5 d-flex justify-content-center">
                        <div class="row bg-white " id="content">
                            <div class="col">
                                <div class="d-flex justify-content-end">
                                    <?php 
                                    $sql3 = "SELECT current_balance
                                    FROM users
                                    WHERE user_id = :user_id";
                                $query3 = $db->prepare($sql3);
                                $query3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                $user_id = $_SESSION['user_id'];
                                $query3->execute();
                                $result3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                    if($query3->rowCount() >0) {
                                        foreach($result3 as $res3)
                                        {
                                        if($res3->current_balance >0)
                                        {

                            ?>
                                    <button class="btn btn-success d-flex justify-content-end d-flex align-items-center mt-3"
                                        data-toggle="modal" data-target="#modal-Expenses"><i
                                            class="fas fa-plus "></i>Add
                                        Expenses</button>
                                    <?php 
                                        } else {

                                       
                            ?>
                                    <button
                                        class="btn btn-danger d-flex justify-content-end d-flex align-items-center mt-3"><i
                                            class="fas fa-plus "></i>Add
                                        Expenses</button>
                                    <?php 
                                 }
                                }
                            }
                            ?>

                                </div>

                                <table id="expense-table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Cost</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $sql2 = "SELECT e.*,c.*
                                    FROM expenses e CROSS JOIN category c
                                    WHERE e.category = c.category_id AND e.user_id = :user_id
                                    ORDER BY e.expenses_time DESC";
                                $query2 = $db->prepare($sql2);
                                $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                $user_id = $_SESSION['user_id'];
                                //echo $_SESSION['user_id'];
                                $query2->execute();
                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                    if($query2->rowCount() >0) {
                                        foreach($result2 as $res2)
                                        {  
                                            echo "<tr>";
                                            echo "<td > <p class='text-uppercase'>$res2->category_name </p></td>";
                                            echo "<td> $res2->cost ฿</td>";
                                            echo "<td> $res2->expense_description</td>";
                                            echo "<td> $res2->expense_date</td>";
                                            echo "</tr>";
                                        }
                                    }
                            ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="row ">
                    <div class="col d-flex justify-content-center" id="remind">
                        <?php 
                                    $sql3 = "SELECT current_balance
                                    FROM users
                                    WHERE user_id = :user_id";
                                $query3 = $db->prepare($sql3);
                                $query3->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                $user_id = $_SESSION['user_id'];
                                $query3->execute();
                                $result3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                    if($query3->rowCount() >0) {
                                        foreach($result3 as $res3)
                                        {  

                            ?>
                        <div class="alert alert-danger col-12 d-flex justify-content-center" role="alert">
                            <marquee scrollamount="5">Remind You Have Current Balance
                                <?php echo $res3->current_balance ?> ฿
                            </marquee>
                        </div>
                        <?php 
                      }
                         }
                ?>
                    </div>

                </div>


            </div>

        </div>
        <div class="modal fade" id="modal-Expenses" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="frmExpenses" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-body-Expenses">
                            <div class="form-row">
                                <div class="form-group  col">
                                    <input type="text" class="form-control" placeholder="Cost Item" name="txt_cost"
                                        required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <select class="custom-select" name="txt_cate" required>
                                        <option selected>Category ...</option>
                                        <?php 
                                         $sql = "Select * FROM category ORDER BY category_id ASC";
                                         $query = $db->prepare($sql);
                                         $query->execute();
                                         $result = $query->fetchAll(PDO::FETCH_OBJ);
                                             if($query->rowCount() >0) {
                                                 foreach($result as $res)
                                                 {   
                                                     echo "<option value='$res->category_id'>$res->category_name</option>";
                                                 }
                                                }
                                    ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="form-control" name="date" Placeholder="Date" required>

                            </div>
                        </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="txt_area"
                                        rows="3"></textarea>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="file" id="uploadimage" name="image">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" id="modal-footer-Expenses">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" value="Upload">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

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

    $(document).ready(function() {
        $('#expense-table').DataTable();



        $(function() {
            $("#frmExpenses").submit(function(e) {
                e.preventDefault();
                console.log("Hello");
                event.preventDefault();
                $.ajax({
                    url: "command/insert_expense.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-Expenses").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#modal-footer-Expenses").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });
        });

        $(function() {
            $("#modal-Expenses").on("hidden.bs.modal",
                function() {
                    location.reload();
                });
        });


    });
    </script>
</body>

</html>
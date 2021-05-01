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
    <link rel="stylesheet" href="style.css">
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
                    <p style="font-size: 12px;"><i class="fas fa-globe-asia" style="color: green;"></i> Online</p>
                    <hr>
                    <p style="font-size: 14.9px;">General</p>
                    <div class="">
                        <a href="dashboard.php" style="font-size: 14.9px;">DashBoard</a>
                    </div>
                    <div class="">
                        <a href="expenses.php" style="font-size: 14.9px;">Expenses</a>
                    </div>
                    <div class="">
                        <a href="expenses_report.php" style="font-size: 14.9px;">Expenses-Report</a>
                    </div>
                    <div class="">
                        <a href="transaction.php" style="font-size: 14.9px;">Transaction</a>
                    </div>
                    <div class="">
                        <a href="transaction_report.php" style="font-size: 14.9px;">Transaction-Report</a>
                    </div>
                    <div class="">
                        <a href="#" style="font-size: 14.9px;">Setting</a>
                    </div>
                    <div class="">
                        <a href="Logout.php" style="font-size: 14.9px;">Logout</a>
                    </div>


                </div>
            </div>


            <div class="col mt-5 content">
                <div class="row">
                    <div class="col">

                    <table id="expense-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Category</th>
                                <th>Cost</th>
                                <th>Description</th>
                                <th>Expense_date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    $sql2 = "SELECT u.username as username , c.category_name as category , e.cost as cost , e.expense_description as descrip, e.expense_date as date
                                    FROM expenses e INNER JOIN category c INNER JOIN users u
                                    WHERE e.category = c.category_id AND e.user_id = u.user_id ";
                                $query2 = $db->prepare($sql2);
                                // $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                                // $user_id = $_SESSION['user_id'];
                                //echo $_SESSION['user_id'];
                                $query2->execute();
                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                    if($query2->rowCount() >0) {
                                        foreach($result2 as $res2)
                                        {  
                                            echo "<tr>";
                                            echo "<td > <p class='text-uppercase'>$res2->username </p></td>";
                                            echo "<td> $res2->category</td>";
                                            echo "<td> $res2->cost ฿</td>";
                                            echo "<td> $res2->descrip</td>";
                                            echo "<td> $res2->date</td>";
                                            echo "</tr>";
                                        }
                                    }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
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
                    <?php 
                      }
                         }
                ?>
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


    });
    </script>

</body>

</html>
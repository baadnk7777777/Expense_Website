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
                        <div class="row bg-white " id="content" style="height: auto;">
                            <div class="col mt-5">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success d-flex justify-content-end d-flex align-items-center"
                                        data-toggle="modal" data-target="#modal-Manage-children"><i
                                            class="fas fa-tools "></i>Manage
                                        Expenses</button>
                                </div>

                                <table id="expense-table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Balance</th>
                                            <th>Mode</th>
                                            <th>Current_Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $sql2 = "SELECT u.username as username, u.balance as balance, m.mode_name as mode, u.current_balance as current_balance, u.user_id as user_id
                                    FROM mode m CROSS JOIN users u
                                    WHERE m.mode_id = u.mode ";
                                $query2 = $db->prepare($sql2);
                                $query2->bindParam(':children', $children, PDO::PARAM_STR);
                                $children = "Children";
                                $query2->execute();
                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                    if($query2->rowCount() >0) {
                                        foreach($result2 as $res2)
                                        {  
                                            echo "<tr>";
                                            echo "<td > <p class='text-uppercase'>$res2->username</p></td>";
                                            echo "<td class='balance'> $res2->balance ฿</td>";
                                            echo "<td class='scope'> $res2->mode</td>";
                                            echo "<td class='current'> $res2->current_balance</td>";
                                            echo "<td>
                                            <i class='fas fa-money-bill-alt text-success add' style='font-size: 200%' id='$res2->user_id' data-toggle='modal' data-target='#modal-Manage' ></i> 
                                            <i class='fas fa-money-bill-alt text-primary edit' style='font-size: 200%' id='$res2->user_id' data-toggle='modal' data-target='#modal-Edit'></i> 
                                            <i class='fas fa-money-bill-alt text-danger Delete' style='font-size: 200%' id='$res2->user_id'></i> </td>";
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



            </div>

        </div>

    </div>
    <!-- Manage-modal             -->
    <div class="modal fade" id="modal-Manage-children" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="manage-children" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manage Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="modal-body-manage-children">
                        <div class="form-row">
                            <div class="form-group  col">
                                <input type="text" class="form-control" placeholder="Balance" name="txt_balance"
                                    required>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="form-group col">
                                <select class="custom-select" name="txt_scope" required>
                                    <option selected>Scope ...</option>
                                    <?php 
                                         $sql = "Select * FROM mode ORDER BY mode_id ASC";
                                         $query = $db->prepare($sql);
                                         $query->execute();
                                         $result = $query->fetchAll(PDO::FETCH_OBJ);
                                             if($query->rowCount() >0) {
                                                 foreach($result as $res)
                                                 {   
                                                     echo "<option value='$res->mode_id'>$res->mode_name</option>";
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
                                <select class="custom-select" name="txt_children" required>
                                    <option selected>Children ...</option>
                                    <?php 
                                         $sql = "Select * FROM users WHERE role LIKE 'children' ORDER BY user_id ASC
                                                     ";
                                         $query = $db->prepare($sql);
                                         $query->execute();
                                         $result = $query->fetchAll(PDO::FETCH_OBJ);
                                             if($query->rowCount() >0) {
                                                 foreach($result as $res)
                                                 {   
                                                     echo "<option value='$res->user_id'>$res->username</option>";
                                                 }
                                                }
                                    ?>
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" id="modal-footer-manage-children">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Manage</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- model delete  -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category ? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="body-delete">
                    <p> Are you sure want to delete ?</p>
                    <p class="text-warning">This action cannot be undo. </p>
                </div>
                <div class="modal-footer" id="footer-delete">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_re">Delete</button>
                    <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add-modern             -->
    <div class="modal fade" id="modal-Manage" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="manage" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manage Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="modal-body-manage">
                        <div class="form-row">
                            <div class="form-group  col">
                                <input type="text" class="form-control" placeholder="Balance" name="txt_balance"
                                    required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="form-control" name="date" Placeholder="Date" required>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" id="modal-footer-manage">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Manage</button>
                        <input type="hidden" class="" id="manage_id" value='' name="manage_id">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit-modern             -->
    <div class="modal fade" id="modal-Edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="Edit" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Manage Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="modal-body-Edit">
                        <div class="form-row">
                            <div class="form-group  col">
                                <input type="text" class="form-control " placeholder="Balance" name="txt_balance"
                                    id="balance" value="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <select class="custom-select " name="txt_scope" id="scope" value="" required>
                                    <option selected>Scope ...</option>
                                    <?php 
                                         $sql = "Select * FROM mode ORDER BY mode_id ASC";
                                         $query = $db->prepare($sql);
                                         $query->execute();
                                         $result = $query->fetchAll(PDO::FETCH_OBJ);
                                             if($query->rowCount() >0) {
                                                 foreach($result as $res)
                                                 {   
                                                     echo "<option value='$res->mode_id'>$res->mode_name</option>";
                                                 }
                                                }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="form-control" name="current" Placeholder="Current_Balance"
                                    id="current" value="">

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" id="modal-footer-Edit">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Edit</button>
                        <input type="hidden" class="" id="edit_id" value='' name="edit_id">
                    </div>
                </form>
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

        $('.Delete').click(function(e) {
            e.preventDefault();
            console.log("DELTE");
            var Delete_ID = $(this).attr('id');
            console.log(Delete_ID);
            $('#modal-delete').modal('show');

            $('#delete_re').click(function(e) {
                console.log("dddd");

                $.ajax({
                    url: 'command/delete_expense.php',
                    method: 'post',
                    // การใส่ data แบบระบุตัวแปล $_POST['Del_ID']
                    data: {
                        Del_ID: Delete_ID
                    },
                    success: function(data) {
                        console.log(data);
                        $("#body-delete").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#footer-delete").html(btnClose);
                    }
                });
            });
        });

        $(function() {
            $("#manage-children").submit(function(e) {
                e.preventDefault();
                console.log("Hello");
                event.preventDefault();
                $.ajax({
                    url: "command/manage_transaction.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-manage-children").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#modal-footer-manage-children").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });
        });

        $(function() {
            $("#manage").submit(function(e) {
                e.preventDefault();
                console.log("Hello");
                event.preventDefault();
                $.ajax({
                    url: "command/add_transaction.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-manage").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#modal-footer-manage").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });
        });

        $('.add').click(function(e) {
            e.preventDefault();
            console.log("add");

            $key = $(this).attr('id'); // ปุุ่มกด
            //console.log($key);

            $('#manage_id').val($key);
        });

        $('.edit').click(function(e) {
            e.preventDefault();
            console.log("edit");

            $balance = $(this).closest("tr").find('.balance').text();
            $scope = $(this).closest("tr").find('.scope').text();
            $current = $(this).closest("tr").find('.current').text();

            $('#balance').val($balance);
            $('#scope').val($scope);
            $('#current').val($current);
            console.log($balance);
            console.log($scope);
            console.log($current);

            $key = $(this).attr('id'); // ปุุ่มกด
            console.log($key);

            $('#edit_id').val($key);
        });

        $(function() {
            $("#Edit").submit(function(e) {
                e.preventDefault();
                console.log("Edit");
                event.preventDefault();
                $.ajax({
                    url: "command/edit_expense.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-Edit").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#modal-footer-Edit").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });
        });

        $(function() {
            $("#modal-Edit, #modal-Manage, #modal-Manage-children, #modal-delete").on("hidden.bs.modal",
                function() {
                    location.reload();
                });
        });


    });
    </script>
</body>

</html>
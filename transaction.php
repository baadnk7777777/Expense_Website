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
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success d-flex justify-content-end d-flex align-items-center"
                                data-toggle="modal" data-target="#modal-Manage-children"><i class="fas fa-tools "></i>Manage
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
                                            <i class='fas fa-money-bill-alt text-danger' style='font-size: 200%' id='$res2->user_id'></i> </td>";
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
                                    <input type="text" class="form-control " placeholder="Balance" name="txt_balance" id="balance" value=""
                                        >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <select class="custom-select " name="txt_scope"  id="scope" value="">
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
                                    <input type="text" class="form-control" name="current" Placeholder="Current_Balance" id="current" value="">

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
            $("#modal-Edit, #modal-Manage").on("hidden.bs.modal",
        function() {
                location.reload();
            });
        });


    });
    </script>

</body>

</html>
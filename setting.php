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
                                data-toggle="modal" data-target="#modal-Manage-category"><i
                                    class="fas fa-tools "></i>Manage
                                Category</button>
                        </div>

                        <table id="expense-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql2 = "SELECT*
                                    FROM category
                                    ORDER BY category_name ASC
                                     ";
                                $query2 = $db->prepare($sql2);
                              //  $query2->bindParam(':children', $children, PDO::PARAM_STR);
                               // $children = "Children";
                                $query2->execute();
                                $order = 1;
                                $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                    if($query2->rowCount() >0) {
                                        foreach($result2 as $res2)
                                        {  
                                            echo "<tr>";
                                            echo "<td> $order </td>";
                                            echo "<td > <p class='text-uppercase category_name'>$res2->category_name</p></td>";
                                            echo "<td>
                                            <i class='fas fa-wrench text-primary edit' style='font-size: 200%' id='$res2->category_id' data-toggle='modal' data-target='#modal-Edit-category'></i> 
                                            <i class='fas fa-trash text-danger Delete' style='font-size: 200%' id='$res2->category_id' ></i> </td>";
                                            echo "</tr>";
                                            $order ++;
                                        }
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
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

        <!-- Manage-modal             -->
        <div class="modal fade" id="modal-Manage-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="manage-category" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Manage Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" id="modal-body-manage-category">
                            <div class="form-row">
                                <div class="form-group  col">
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="txt_category" required>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer" id="modal-footer-manage-category">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" value="Upload">Manage</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <!-- Edit-modern             -->
        <div class="modal fade" id="modal-Edit-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="Edit" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Expenses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body" id="modal-body-edit-category">
                            <div class="form-row">
                                <div class="form-group  col">
                                    <input type="text" class="form-control" placeholder="Category Name" id="manage_id"
                                        name="txt_category" required>
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

        $('.Delete').click(function(e) {
            e.preventDefault();
            console.log("DELTE");
            var Delete_ID = $(this).attr('id');
            console.log(Delete_ID);
            $('#modal-delete').modal('show');

            $('#delete_re').click(function(e) {
                console.log("dddd");

                $.ajax({
                    url: 'command/delete_category.php',
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

        $('.edit').click(function(e) {
            e.preventDefault();
            console.log("edit");

            $name = $(this).closest("tr").find('.category_name').text();

            $('#manage_id').val($name);

            $key = $(this).attr('id'); // ปุุ่มกด
            console.log($key);

            $('#edit_id').val($key);
        });

        $(function() {
            $("#manage-category").submit(function(e) {
                e.preventDefault();
                console.log("Hello");
                event.preventDefault();
                $.ajax({
                    url: "command/category_insert.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-manage-category").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#modal-footer-manage-category").html(btnClose);
                    },
                    error: function(data) {
                        console.log("An error accured." + data);
                    }
                });
            });
        });

        $(function() {
            $("#Edit").submit(function(e) {
                e.preventDefault();
                console.log("Edit");
                event.preventDefault();
                $.ajax({
                    url: "command/category_edit.php",
                    type: "post",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        //alert("Expense Success!");
                        //$('.alert').alert()
                        $("#modal-body-edit-category").html(data);
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
            $("#modal-Manage-category, #modal-Edit-category, #modal-delete").on("hidden.bs.modal",
                function() {
                    location.reload();
                });
        });


    });
    </script>

</body>

</html>
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
                <div class="row">
                    <div class="col mt-5">
                        <div class="jumbotron bg-white">
                            <h1 class="display-4">Welcome, <?php echo $_SESSION['name']?></h1>
                            <p class="lead">This is Expense Manager</p>
                            <hr class="my-4">

                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="dashboard.php" role="button">Dash Board</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        console.log("ready!");
    });
    </script>
</body>

</html>
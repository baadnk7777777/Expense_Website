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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2b7bd13048.js" crossorigin="anonymous"></script>
  </head>
  <body>
      <div class="container-fluid">
          <div class="row" id="background">
            <div class="col-2" id="sidebar-menu">
                <div class="d-flex justify-content-center mt-5" > <h3>Expense manager</h3> </div>
                <div class="d-flex justify-content-center mt-3"><p>General</p></div>
                <hr>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-chart-line mr-4"></i> <a href="dashboard.php" style="color: #181A1B;" >DashBoard</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center " id="sidebar"><i class="fab fa-bitcoin mr-4"></i><a href="expenses.php"style="color: #181A1B;">Expenses</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-clipboard-list mr-4"></i><a href="expenses_report.php"style="color: #181A1B;">Expenses Report</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-exchange-alt mr-4"></i><a href="transaction.php"style="color: #181A1B;">Transactions</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-clipboard-list mr-4"></i><a href="transaction_report.php"style="color: #181A1B;">Transactions Report</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-cogs mr-4"></i><a href="setting.php"style="color: #181A1B;">Setting</a><i class="fas fa-chevron-right ml-auto"></i></div>
                <div class="d-flex justify-content-start mt-2 d-flex align-items-center" id="sidebar"><i class="fas fa-sign-out-alt mr-4"></i><a href="Logout.php"style="color: #181A1B;">Logout</a><i class="fas fa-chevron-right ml-auto"></i></div>
            </div>
            <div class="col">

            <nav class="navbar navbar-expand-lg navbar-light navback mt-4">
  <img src="image/user-1.png" alt="profile" width="3%">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">

      <li class="nav-item ml-3 mt-3">
        <p class="text-uppercase" style="font-size: 20px "><?php echo $_SESSION['name']?></p>
      </li>

      <li class="nav-item ml-3 mt-3" >
        <p class="text-uppercase" style="font-size: 20px"><?php echo $_SESSION['role']?></p>
      </li>

      <li class="nav-item ml-3 mt-4">
      <i class="fas fa-cog"  style="font-size: 20px"></i>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="row mt-5 ">
    <div class="col">
        <div class="row bg-white ml-1">
            <div class="col "><p class="text-uppercase bg-primary text-white d-flex justify-content-center">Total Balance</p>
        </div>
        </div>
        <div class="row">
            <div class="col"><p class="bg-white">123</p></div>
        </div>
    </div>
    <div class="col">
        <p class="total text-uppercase d-flex justify-content-center pt-3">Total Expenses</p>
    </div>
    <div class="col">
        <p class="total text-uppercase d-flex justify-content-center pt-3">Current Balance</p>
    </div>
</div>
                </div>
            </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
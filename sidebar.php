<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>    
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container-scroller"> -->
        <!-- sidebar start -->



        <?php

            session_start();
            if (!isset($_SESSION['email'])) {
                header('Location: login.php');
                exit;
            }


        ?>


        <div class="sidebar">
            <div class="col-12 d-flex info">
                <div class="col-3 pt-2">
                    <img src="images/<?php echo $_SESSION['img'] ; ?>">
                </div>
                <div class="col-9 mx-5 pt-4">
                    <h3><?php echo $_SESSION['name'] ; ?></h3>
                    <p><?php echo $_SESSION['profession'] ;  ?></p>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <?php
                    if($_SESSION['type'] == 0){
                        ?>    
                        <li class="nav-item">
                    <a class="nav-link" href="create.php" >
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span class="menu-title">Create Employee</span>
                    </a>
                </li>
                <?php
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link"  href="check-in-out.php">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="menu-title">Check In / Out</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="task.php">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="menu-title">Task</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="leave.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span class="menu-title">Leave</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar end -->
    <!-- </div>
</body>
</html> -->
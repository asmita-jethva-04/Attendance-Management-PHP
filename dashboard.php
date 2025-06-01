<!DOCTYPE html>
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
    <div class="container-scroller">
        <!-- sidebar start --> 
        <?php 
            include('sidebar.php');
        ?>
        <!-- sidebar end -->

        <!-- content start -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin transparent header d-flex justify-content-between align-items-center">
                    <div class="col-md-3">
                        <i class="fa fa-align-justify" title="Align Justify"></i>
                    </div>
                    <div class="col-md-9 d-flex justify-content-end">
                        <i class="fa fa-envelope px-4" aria-hidden="true"></i>
                        <button class="btn btn-light px-4 ms-2"><a href="logout.php">Logout</a></button>
                    </div>
                </div>
                <div class="col-md-12 grid-margin transparent text-center my-5">
                    <div class="row">
                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">Total Employee</p>
                                    <?php
                                        include('config.php');
                                        $sql = "SELECT COUNT(*) FROM `employees`";
                                        $result = $conn->query($sql);
                                        $rowss = $result->fetch_assoc();
                                        $count = $rowss['COUNT(*)'];
                                        echo  $count;

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Check In / Out</p>
                                    <?php
                                        include('config.php');
                                        $sql = "SELECT COUNT(*) FROM `check-in-out`";
                                        $result = $conn->query($sql);
                                        $rowss = $result->fetch_assoc();
                                        $count = $rowss['COUNT(*)'];
                                        echo  $count;

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Task</p>
                                    <?php
                                        include('config.php');
                                        $sql = "SELECT COUNT(*) FROM `task`";
                                        $result = $conn->query($sql);
                                        $rowss = $result->fetch_assoc();
                                        $count = $rowss['COUNT(*)'];
                                        echo  $count;

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer mt-auto">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $_SESSION['email'] ; ?></span>
              </div>
          </footer>
        </div>
        <!-- content end  -->
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

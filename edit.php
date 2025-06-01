<?php
// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include the database connection file
    include "config.php";

    // Fetch the record from the database
    $query = "SELECT * FROM `employees` WHERE id='$id'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the data as an associative array
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit;
    }
} else {
    echo "No ID provided!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
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

        <!-- form start -->
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
                <div class="col-md-12 grid-margin transparent text-center my-5 card form">
                    <div class="row">
                        <div class="col-md-12 grid-margin d-flex justify-content-between align-items-center my-3">
                            <div class="col-md-3">
                                <h1>New Employee</h1>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <button class="btn btn-light px-4 ms-2"><a href="create.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form method="post" action="update.php" enctype="multipart/form-data" id="form">
                                <input type="hidden" value="0" name="type">

                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="text" name="name" class="form-control" placeholder="Your name..." value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="email" name="email" class="form-control" placeholder="Your email..." value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="password" name="password" class="form-control" placeholder="Your password..." value="<?php echo $row['password']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="mobno" class="form-control" placeholder="Your mobile no..." value="<?php echo $row['mobno']; ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <select class="form-control" name="profession">
                                            <option value="" disable>-- Select your profession --</option>
                                            <option value="super admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="hr">Hr</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input type="file" name="image" class="form-control mb-2" accept="image/*">
                                        <!-- Display existing image -->
                                        <?php if ($row['img']): ?>
                                            <img src="images/<?php echo $row['img']; ?>" alt="Current Image" width="100" height="100">
                                        <?php endif; ?>
                                            <!-- Hidden input to store the existing image name -->
                                            <input type="hidden" name="existing_image" value="<?php echo $row['img']; ?>">
                                                
                                    </div>
                                </div>
                                <div class="col-12 text-center mb-5">
                                    <button class="btn btn-light px-5 ms-2" type="submit">UPDATE</button>
                                </div>
                            </from>
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
        <!-- form end  -->

</div>

     
<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }

		function toggleDetails(element) {
            const hiddenRow = element.nextElementSibling;
            if (hiddenRow.style.display === "block") {
                hiddenRow.style.display = "none";
                element.innerHTML = "<i class='fa fa-plus'></i>";
            } else {
                hiddenRow.style.display = "block";
                element.innerHTML = "<i class='fa fa-minus'></i>";
            }
        }
</script>
</body>
</html>
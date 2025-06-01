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
                        <!-- <div class="col-md-12">
                            <form method="post" action="store.php" enctype="multipart/form-data" id="form">
                                <input type="hidden" value="0" name="type">

                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="text" name="name" class="form-control" placeholder="Your name...">
                                    </div>
                                    <div class="col-6">
                                        <input type="email" name="email" class="form-control" placeholder="Your email...">
                                    </div>
                                </div>
                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="password" name="password" class="form-control" placeholder="Your password...">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="mobno" class="form-control" placeholder="Your mobile no...">
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
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-12 text-center mb-5">
                                    <button class="btn btn-light px-5 ms-2" type="submit">ADD</button>
                                </div>
                            </from>
                        </div> -->
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col" width="10%">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No:</th>
                                        <th scope="col">Profession</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                // Check if the 'id' parameter is present in the URL before using it
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                } else {
                                                    // Handle the case when 'id' is not set, e.g., redirect or show a message
                                                    echo "<p>No ID provided in the query string</p>";
                                                    exit; // Stop the script here
                                                }

                                                // MySQL connection string
                                                include "config.php"; // Assumes $conn is the connection object

                                                // Prepare and execute the SQL query
                                                $query = "SELECT * FROM `employees` WHERE id='$id'";
                                                $result = $conn->query($query);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <th scope='row'>". $row['id'] . "</th>
                                                            <td class='lg'><img src='images/" . $row['img'] . "' alt='Image' width='50' height='50' loading='lazy'></td>
                                                            <td>". $row['name'] . "</td>
                                                            <td class='lg'>". $row['email'] . "</td>
                                                            <td class='lg'>". $row['profession'] . "</td>
                                                            <td class='lg'>". $row['mobno'] . "</td>
                                                        </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='10'>No records found</td></tr>";
                                                }

                                                // Close the connection
                                                $conn->close();
                                    ?>
                                </tbody>
                            </table>
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

</body>
</html>
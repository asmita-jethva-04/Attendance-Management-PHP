<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In / Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>    
    <link rel="stylesheet" type="text/css" href="style.css">


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

</head>
<body>
<div class="container-scroller">
        <!-- sidebar start -->
        <?php 
            include('sidebar.php');
        ?>
        <!-- sidebar end -->


        
        <!-- check-in-out start -->
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
                <div class="col-md-12 grid-margin transparent text-center my-5 card time">
                    <div class="row">
                        <div class="col-md-12 grid-margin d-flex justify-content-between align-items-center my-3">
                            <div class="col-md-3">
                                <h1>Check In / Out</h1>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <button class="btn btn-light px-4 ms-2"><a href="check-in-out.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="col-12 mt-5 text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col" width="20%">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Check In</th>
                                                <th scope="col">Check Out</th>
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
                                                $query = "SELECT * FROM `check-in-out` WHERE id='$id'";
                                                $result = $conn->query($query);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                                            <th scope='row'>". $row['id'] . "</th>
                                                            <td class='lg'><img src='images/" . $row['image'] . "' alt='Image' width='50' height='50'></td>
                                                            <td>". $row['name'] . "</td>
                                                            <td class='lg'>". $row['date'] . "</td>
                                                            <td class='lg'>". $row['check-in'] . "</td>
                                                            <td class='lg'>". $row['check-out'] . "</td>
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
            </div>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer mt-auto">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $_SESSION['email'] ; ?></span>
              </div>
          </footer>
        </div>
        <!-- check-in-out end  -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
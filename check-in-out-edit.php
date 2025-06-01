<?php
// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include the database connection file
    include "config.php";

    // Fetch the record from the database
    $query = "SELECT * FROM `check-in-out` WHERE id='$id'";

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
    <title>Check In / Out</title>
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
                                <h4>Check In / Out Edit</h4>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <button class="btn btn-light px-4 ms-2"><a href="check-in-out.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="col-12 text-center time">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Check IN / OUT
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post"  action="check-in-out-update.php" enctype="multipart/form-data">
                                                <input type="file" class="form-control mt-2" placeholder="Choose image" name="image">
                                                <!-- Display existing image -->
                                                    <?php if ($row['image']): ?>
                                                        <img src="images/<?php echo $row['image']; ?>" alt="Current Image" width="100" height="100">
                                                    <?php endif; ?>
                                                    <!-- Hidden input to store the existing image name -->
                                                    <input type="hidden" name="existing_image" value="<?php echo $row['image']; ?>">
                                                
                                                <select class="form-control mt-2" name="name">
                                                    <option value="" disable>-- Select Your Name -- </option>
                                                    <?php
                                                        include('config.php');

                                                        $sql = "SELECT name FROM employees";
                                                        $result = $conn->query($sql);
                                                      
                                                       
                                                        if($result->num_rows > 0){
                                                            while ($rowss = $result->fetch_assoc()) {

                                                            echo '<option value="' . $rowss['name'] . '" style="color:black;" ' . ($rowss['name'] == $row['name'] ? 'selected' : '') . '>';
                                                            echo $rowss['name'];
                                                            echo '</option>';

                                                            }
                                                        }   
                                                    ?>
                                                </select>
                                                <?php echo $row['date']; ?>
                                                <input type="date" class="form-control mt-2" name="date" value="<?php echo $row['date']; ?>">
                                                <input type="time" class="form-control mt-2" placeholder="Enter Check-in time" name="check-in" value="<?php echo $row['check-in']; ?>">
                                                <input type="time" class="form-control mt-2" placeholder="Enter Check-out time" name="check-out" value="<?php echo $row['check-out']; ?>">
                                                        
                                                 <!-- Hidden field to pass the ID -->
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn text-light"  style="background-color:#580606">Submit</button>
                                                </div>
                                           
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12 mt-5 text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col" width="20%">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Check In</th>
                                                <th scope="col">Check Out</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    include('config.php');

                                                    $sql = "SELECT * FROM `check-in-out`";
                                                    $result = $conn->query($sql);
                                                    $id=0;

                                                    if($result->num_rows > 0){
                                                        while ($row = $result->fetch_assoc()) {
                                                            $id = $id + 1;
                                                            
                                                            echo "<tr>
                                                            <th scope='row'>". $id . "</th>
                                                            <td class='lg'><img src='images/" . $row['image'] . "' alt='Image' width='50' height='50' loading='lazy'></td>
                                                            <td>". $row['name'] . "</td>
                                                            <td class='lg'>". $row['date'] . "</td>
                                                            <td class='lg'>". $row['check-in'] . "</td>
                                                            <td class='lg'>". $row['check-out'] . "</td>
                                                            <td class='lg'>
                                                                <a href='check-in-out-show.php?id=" . $row['id'] . "'>
                                                                    <button class='show btn btn-sm btn-primary' type='button'>Show</button>
                                                                </a>
                                                                <a href='edit.php?id=" . $row['id'] . "'>
                                                                    <button class='show btn btn-sm btn-warning' type='button'>Edit</button>
                                                                </a>
                                                                <a href='delete.php?id=" . $row['id'] . "'>
                                                                    <button class='show btn btn-sm btn-danger' type='button'>Delete</button>
                                                                </a>
                                                            </td>
                                                            ";
                                                        }
                                                    }
                                                ?>
                                        </tbody>
                                    </table>
                                </div> -->
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
<?php
// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include the database connection file
    include "config.php";

    // Fetch the record from the database
    $query = "SELECT * FROM task WHERE id='$id'";

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

        <!-- task start -->
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
                <div class="col-md-12 grid-margin transparent text-center my-5 card task">
                    <div class="row">
                        <div class="col-md-12 grid-margin d-flex justify-content-between align-items-center my-3">
                            <div class="col-md-1">
                                <h1>Task</h1>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <button class="btn btn-light px-4 ms-2"><a href="task.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                        <div class="col-12 text-center time">
                                     <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Task
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
                                            <form method="post" id="form-id" action="task-update.php" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">   
                                            <input type="file" class="form-control" name="image">
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
                                                <textarea class="form-control mt-2" placeholder="Enter your task" name="task"><?php echo $row['task']; ?></textarea>
                                                 <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"  >Submit</button>
                                                </div>
                                           
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
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
        <!-- task end  -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



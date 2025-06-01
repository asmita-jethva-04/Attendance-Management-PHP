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
                                <button class="btn btn-light px-4 ms-2"><a href="dashboard.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                        <div class="col-12 text-center time">
                                     <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                            <form method="post" id="form-id" action="task-store.php" enctype="multipart/form-data">
                                                <input type="file" class="form-control" name="image" required>
                                                <select class="form-control mt-2" name="name" required>
                                                    <option value="" disable>-- Select Your Name -- </option>
                                                    <?php
                                                        include('config.php');

                                                        $sql = "SELECT name FROM employees";
                                                        $result = $conn->query($sql);
                                                        $id=0;
                                                       
                                                        if($result->num_rows > 0){
                                                            while ($row = $result->fetch_assoc()) {
                                                                $id = $id + 1;
                                                                echo "<option value=". $row['name'] . " style='color:black;'> ". $row['name'] . "</option>";   
                                                            }
                                                        }   
                                                    ?>
                                                </select>
                                                <textarea class="form-control mt-2" placeholder="Enter your task" name="task" required></textarea>
                                                 <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn modelsub"  >Submit</button>
                                                </div>
                                           
                                            </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 mt-5 text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col" width="20%">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('config.php');

                                        $sql = "SELECT * FROM task";
                                        $result = $conn->query($sql);
                                        $id=0;

                                        if($result->num_rows > 0){
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $id + 1;
                                                            
                                                echo "<tr>
                                                    <th scope='row'>". $id . "</th>
                                                    <td class='lg'><img src='images/" . $row['image'] . "' alt='Image' width='50' height='50' loading='lazy'></td>
                                                    <td>". $row['name'] . "</td>
                                                    <td class='lg'>". $row['task'] . "</td>
                                                    <td class='lg'>
                                                        <a href='task-show.php?id=" . $row['id'] . "'>
                                                            <button class='show btn btn-sm btn-primary' type='button'>Show</button>
                                                        </a>
                                                        <a href='task-edit.php?id=" . $row['id'] . "'>
                                                            <button class='show btn btn-sm btn-warning' type='button'>Edit</button>
                                                        </a>
                                                        <a href='task-delete.php?id=" . $row['id'] . "' onclick='return confirmDelete()'>
                                                            <button class='show btn btn-sm btn-danger' type='button'>Delete</button>
                                                        </a>
                                                    </td>
                                                ";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
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



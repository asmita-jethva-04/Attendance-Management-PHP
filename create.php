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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                                <button class="btn btn-light px-4 ms-2"><a href="dashboard.php">Back</a></button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <form method="post" action="store.php" enctype="multipart/form-data" id="form"> -->
                            <form id="form">
                                <input type="hidden" value="0" name="type">

                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name..." required>
                                    </div>
                                    <div class="col-6">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Your email..." required>
                                    </div>
                                </div>
                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Your password..." required>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" name="mobno" id="mobno" class="form-control" placeholder="Your mobile no..." required>
                                    </div>
                                </div>
                                <div class="col-12 d-flex mb-3">
                                    <div class="col-6">
                                        <select class="form-control" name="profession" id="profession" required>
                                            <option value="" disable>-- Select your profession --</option>
                                            <option value="super admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="hr">Hr</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-12 text-center mb-5">
                                    <button class="btn btn-light px-5 ms-2" id="submit" type="submit">ADD</button>
                                </div>
                            </from>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col" width="10%">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No:</th>
                                        <th scope="col">Profession</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="studentdata">
                                
                                </tbody>


                                <tbody>
                                    <?php
                                        include('config.php');

                                        $sql = "SELECT *FROM employees";
                                        $result = $conn->query($sql);
						                $id=0;

                                        if($result->num_rows > 0){
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $id + 1;
                                                
                                                echo "<tr>
                                                <th scope='row'>". $id . "</th>
                                                <td class='lg'><img src='images/" . $row['img'] . "' alt='Image' width='50' height='50' loading='lazy'></td>
                                                <td>". $row['name'] . "</td>
                                                <td class='lg'>". $row['email'] . "</td>
                                                <td class='lg'>". $row['mobno'] . "</td>
                                                <td class='lg'>". $row['profession'] . "</td>
                                                <td class='lg'>
                                                    <a href='show.php?id=" . $row['id'] . "'>
                                                        <button class='show btn btn-sm btn-primary' type='button'>Show</button>
                                                    </a>
                                                    <a href='edit.php?id=" . $row['id'] . "'>
                                                        <button class='show btn btn-sm btn-warning' type='button'>Edit</button>
                                                    </a>
                                                    <a href='delete.php?id=" . $row['id'] . "' onclick='return confirmDelete()'>
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
          <!-- content-wrapper ends -->
          <footer class="footer mt-auto">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><?php echo $_SESSION['email'] ; ?></span>
              </div>
          </footer>
        </div>
        <!-- form end  -->

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#submit').click(function(e){
                e.preventDefault(); // Prevent the form from submitting the traditional way

                // Create FormData object
                var formData = new FormData(document.getElementById('form'));

                $.ajax({
                    url: 'store.php', // Backend script to handle the data
                    method: 'POST',
                    data: formData, // Pass the FormData object
                    contentType: false, // Required for FormData
                    processData: false, // Prevent jQuery from automatically processing data
                    success: function(response){
                        // alert("Data submitted successfully!");
                        document.getElementById('form').reset(); // Reset the form
                    },
                    // error: function(err){
                    //     alert("There was an error submitting the form.");
                    //     console.error(err);
                    // }
                });
            });
        });       
    </script>
    
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <script>
    $(document).ready(function() {
        var response = '';
        $.ajax({
            type: "GET",
            url: "featch.php",
            async: false,
            success: function(text) {
                response = text;
            }
        });

        alert(response);
    });
    </script>








   



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

                $('#form').submit(function(e) {
                    e.preventDefault();
                });
        </script>
</body>
</html>
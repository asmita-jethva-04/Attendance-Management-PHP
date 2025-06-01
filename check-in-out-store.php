<?php 

    include('config.php');

    $name = $_POST['name'];

    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $newname = time() . "-" . $filename .'.jpg';
    $path = 'images/' . $newname;
    move_uploaded_file($tmp_name, $path);

    $date = $_POST['date'];
    $check_in = $_POST['check-in'];
    $check_out = $_POST['check-out'];

    $sql = "INSERT INTO `check-in-out` (`name`, `image`, `date`, `check-in`, `check-out`) VALUES ('$name','$newname','$date','$check_in','$check_out')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        header("location:check-in-out.php");
    }else{
        echo "Error:". $sql . "<br>". $conn->error;	
    } 
    $conn->close(); 
?>
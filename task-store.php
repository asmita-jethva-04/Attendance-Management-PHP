<?php

    include('config.php');

    $name = $_POST['name'];
    $task = $_POST['task'];

    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $newname = time() . "-" . $filename .'.jpg';
    $path = 'images/' . $newname;
    move_uploaded_file($tmp_name, $path);

    $sql = "INSERT INTO `task` (`name`, `image`, `task`) VALUES ('$name','$newname','$task')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        header("location:task.php");
    }else{
        echo "Error:". $sql . "<br>". $conn->error;	
    } 
    $conn->close();

?>
<?php

    include("../../config.php");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['image'];
    $task = $_POST['task'];


    // echo $id;
    // echo $name;
    // echo $img;
    // echo $task;
   
    // die();

    $qry = "UPDATE `task` SET `name`='$name',`image`='$img',`task`='$task' WHERE `id`='$id'";

    $result = $conn->query($qry);
    echo json_encode(["message" => "User updated successfully"]);
    $conn->close();

?>
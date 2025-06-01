<?php

    include("../../config.php");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['image'];
    $date = $_POST['date'];
    $checkin = $_POST['check-in'];
    $checkout = $_POST['check-out'];

    // echo $id;
    // echo $name;
    // echo $img;
    // echo $date;
    // echo $checkin;
    // echo $checkout;
    
    // die();

    $qry = "UPDATE `check-in-out` SET `name`='$name',`image`='$img',`date`='$date',`check-in`='$checkin', `check-out`='$checkout' WHERE `id`='$id'";

    $result = $conn->query($qry);
    echo json_encode(["message" => "User updated successfully"]);
    $conn->close();

?>
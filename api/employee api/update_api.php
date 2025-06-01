<?php

    include("../../config.php");

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profession = $_POST['profession'];
    $mobno = $_POST['mobno'];
    $img = $_POST['img'];
    $type = $_POST['type'];

    // echo $id;
    // echo $name;
    // echo $email;
    // echo $password;
    // echo $profession;
    // echo $mobno;
    // echo $img;
    // echo $type;

    
    // die();

    $qry = "UPDATE `employees` SET `name`='$name',`email`='$email',`password`='$password',`profession`='$profession', `mobno`='$mobno',`img`='$img',`type`='$type' WHERE `id`='$id'";

    $result = $conn->query($qry);
    echo json_encode(["message" => "User updated successfully"]);
    $conn->close();

?>
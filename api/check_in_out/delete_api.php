<?php

    include("../../config.php");
    $id = $_POST['id'];
    // echo $id;
    // die();
    // $qry = "DELETE FROM client";
    $qry = "DELETE FROM `check-in-out` WHERE id = $id";
    $result = $conn->query($qry);
    echo json_encode(["message" => "User deleted successfully"]);
    $conn->close();


?>
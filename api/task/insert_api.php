<?php

    include("../../config.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    else{
        $name="";
    }
    if(isset($_POST['image'])){
        $img = $_POST["image"];
    }else{
        $img= "";
    }
    if(isset($_POST['task'])){
        $task = $_POST["task"];
    }else{
        $task= "";
    }
    

    if($name==null || $name == ""){
        echo json_encode(array('message' => 'Please insert name', 'status' => false)); 
      //  die(); 
      } 
    

    $qry = "INSERT INTO `task` (`name`, `image`, `task`) VALUES ('$name' , '$img ', '$task')";

   

    $result = $conn->query($qry);
    $last_id = $conn->insert_id;
    // echo $last_id;

    $qry2 = "SELECT * FROM `task` WHERE id = '$last_id'";
    $result2 = $conn->query($qry2);
    $row = $result2->fetch_assoc();
    $data = array();
    $data["idss"] = $row["id"];
    $data["names"] = $row["name"];
    $data["img"] = $row["image"];
    $data["task"] = $row["task"];

    echo json_encode($data);

    $conn->close();


?>
<?php

    include("../../config.php");

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    else{
        $name="";
    }
    if(isset($_POST['email'])){
        $email = $_POST["email"];
    }else{
        $email= "";
    }
    if(isset($_POST['password'])){
        $password = $_POST["password"];
    }else{
        $password= "";
    }
    if(isset($_POST['profession'])){
        $profession = $_POST["profession"];
    }else{
        $profession= "";
    }
    if(isset($_POST['mobno'])){
        $mobno = $_POST["mobno"];
    }else{
        $mobno= "";
    }
    if(isset($_POST['img'])){
        $img = $_POST["img"];
    }else{
        $img= "";
    }
    if(isset($_POST['type'])){
        $type = $_POST["type"];
    }else{
        $type= "";
    }

    if($name==null || $name == ""){
        echo json_encode(array('message' => 'Please insert name', 'status' => false)); 
      //  die(); 
      } 
    

    $qry = "INSERT INTO employees (name, email, password, profession, mobno,img,type) VALUES ('$name' , '$email ', '$password','$profession','$mobno','$img','$type')";

   

    $result = $conn->query($qry);
    $last_id = $conn->insert_id;
    // echo $last_id;

    $qry2 = "SELECT * FROM employees WHERE id = '$last_id'";
    $result2 = $conn->query($qry2);
    $row = $result2->fetch_assoc();
    $data = array();
    $data["idss"] = $row["id"];
    $data["names"] = $row["name"];
    $data["email"] = $row["email"];
    $data["password"] = $row["password"];
    $data["profession"] = $row["profession"];
    $data["mobno"] = $row["mobno"];
    $data["img"] = $row["img"];
    $data["type"] = $row["type"];

    echo json_encode($data);

    $conn->close();


?>
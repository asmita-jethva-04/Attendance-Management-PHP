<?php

    include('config.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd = md5($password);
    $mobno = $_POST['mobno'];
    $profession = $_POST['profession'];

    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $newname = time() . "-" . $filename .'.jpg';
    $path = 'images/' . $newname;
    move_uploaded_file($tmp_name, $path);

    if($profession == 'super admin'){
        $type=0;
    }elseif($profession == 'admin'){
        $type=1;
    }elseif($profession == 'hr'){
        $type=2;
    }else{
        $type=3;
    }

    $sql = "INSERT INTO employees (name,email,password,profession,mobno,img,type,status,is_delete) VALUES ('$name','$email','$pwd','$profession','$mobno','$newname','$type','null','null')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        header("location:create.php");
    }else{
        echo "Error:". $sql . "<br>". $conn->error;	
    } 
    $conn->close(); 

?>
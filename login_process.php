<?php

    session_start();

    include('config.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = md5($password);


        $query = "SELECT * FROM employees WHERE email='$email' and password = '$hashed_password'";
        
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Fetch the data as an associative array
            $row = $result->fetch_assoc();

            if($hashed_password == $row['password']){
                $_SESSION['email'] = $email;
                


                // Fetch the record from the database
            $query = "SELECT * FROM  employees WHERE email= '$email'";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // Fetch the data as an associative array
                $row = $result->fetch_assoc();
            } else {
                echo "Record not found!";
                exit;
            }

            // print_r($row['profession']);
            // 0 = super admin 
            // 1 = admin 
            // 2 = hr 
            // 3 = employ 
            if($row['profession'] == 'super admin'){
                $_SESSION['type'] = 0;
            } elseif ($row['profession'] == 'admin'){
                $_SESSION['type'] = 1;
            }elseif($row['profession'] == 'hr'){
                $_SESSION['type'] = 2;
            }elseif($row['profession'] == 'employee'){
                $_SESSION['type'] = 3;
            }else{
                echo "Something went wrong...";
            }
            
            $_SESSION['name'] = $row['name'];
            $_SESSION['profession'] = $row['profession'];
            $_SESSION['img'] = $row['img'];

            // $_SESSION['password'] = $row['password'];
                header('Location: dashboard.php');
                exit;
            }
            else{
                header('Location: login.php?error=invalid_credentials');
                exit;
            }
           
        } else {
            header('Location: login.php?error=user_not_found');
             exit;
        }
    } else {
        echo "No ID provided!";
        exit;
    }

?>
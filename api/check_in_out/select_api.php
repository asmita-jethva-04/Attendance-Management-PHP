<?php

    include("../../config.php");

    $qry = "SELECT * FROM `check-in-out`";
    $result = $conn->query($qry);

    if( $result->num_rows > 0){
        $output = [];
        while($row = $result->fetch_assoc() ){
            $data = array();


            $imagepath="http://localhost/attendance/images/".$row["image"];
            $data["Ids"] = $row["id"];
            $data["Name"] = $row["name"];
            $data["Image"] = $imagepath;
            $data["Date"] = $row["date"];
            $data["Check In"] = $row["check-in"];
            $data["Check Out"] = $row["check-out"];



            $output[]= $data;
        }

        echo json_encode($output);
    }else{
        echo "something went wrong";
    }


?>
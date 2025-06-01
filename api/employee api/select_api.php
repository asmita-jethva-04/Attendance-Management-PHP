<?php

    include("../../config.php");

    $qry = "SELECT * FROM employees";
    $result = $conn->query($qry);

    if( $result->num_rows > 0){
        $output = [];
        while($row = $result->fetch_assoc() ){
            $data = array();


            $type='';

            if($row["type"] == 0){
                $type = "super admin";
            }else if($row["type"] == 1){
                $type = "admin";
            }else if($row["type"] == 2){
                $type = "hr";
            }else if($row["type"] == 3){
                $type = "employee";
            }else{
                $type = "Something is wrong";
            }

            $imagepath="http://localhost/attendance/images/".$row["img"];
            $data["Ids"] = $row["id"];
            $data["Name"] = $row["name"];
            $data["Email"] = $row["email"];
            $data["Password"] = $row["password"];
            $data["Profession"] = $row["profession"];
            $data["Mobile No"] = $row["mobno"];
            $data["Image"] = $imagepath;
            $data["Type"] = $type;



            $output[]= $data;
        }

        echo json_encode($output);
    }else{
        echo "something went wrong";
    }


?>
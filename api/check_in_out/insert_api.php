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
        if(isset($_POST['date'])){
            $date = $_POST["date"];
        }else{
            $date= "";
        }
        if(isset($_POST['check-in'])){
            $checkin = $_POST["check-in"];
        }else{
            $checkin= "";
        }
        if(isset($_POST['check-out'])){
            $checkout = $_POST["check-out"];
        }else{
            $checkout= "";
        }
        

        if($name==null || $name == ""){
            echo json_encode(array('message' => 'Please insert name', 'status' => false)); 
        //  die(); 
        } 
        

        $qry = "INSERT INTO `check-in-out` (`name`, `image`, `date`, `check-in`, `check-out`) VALUES ('$name' , '$img ', '$date','$checkin','$checkout')";

    

        $result = $conn->query($qry);
        $last_id = $conn->insert_id;
        // echo $last_id;

        $qry2 = "SELECT * FROM `check-in-out` WHERE id = '$last_id'";
        $result2 = $conn->query($qry2);
        $row = $result2->fetch_assoc();
        $data = array();
        $data["idss"] = $row["id"];
        $data["names"] = $row["name"];
        $data["img"] = $row["image"];
        $data["date"] = $row["date"];
        $data["Check In"] = $row["check-in"];
        $data["Check Out"] = $row["check-out"];

        echo json_encode($data);

        $conn->close();


    ?>
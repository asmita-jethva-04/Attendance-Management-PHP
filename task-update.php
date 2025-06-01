<?php

    include('config.php');

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $task = $_POST['task'];

        // print_r($id);
        // die();

        // Handle file upload for image
        if (!empty($_FILES['image']['name'])) {
            // If a new image is uploaded, move it to the images folder
            $image = $_FILES['image']['name'];
            $target = "images/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        } else {
            // If no new image is uploaded, use the old image from the hidden input
            $image = $_POST['existing_image'];
        }

        // Update the record in the database    
        $query = "UPDATE `task` SET `name`='$name',`image`='$image',`task`='$task' WHERE `id`='$id'";
        
        if ($conn->query($query) === TRUE) {
            echo "Record updated successfully!";
            header('Location: task.php'); // Redirect back to the list
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }

        // Close the connection
        $conn->close();
    }

?>
<?php

    include('config.php');

    // Check if 'id' is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // image delete form the folder
        $result = $conn->query("SELECT `image` FROM `task` WHERE id='$id'");
        $row = $result->fetch_assoc();
        $filename = 'images/'.$row['image'];  
        unlink($filename);
    
        // Prepare the DELETE SQL query
        $query = "DELETE FROM `task` WHERE id='$id'";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            // Redirect back to the list page after successful deletion
            header('Location: task.php');
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "No ID provided.";
    }

    // Close the database connection
    $conn->close();

?>

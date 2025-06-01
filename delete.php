<?php
// Include database connection file
include "config.php";

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // print_r($id);
    // die();

    // image delete form the folder
    $result = $conn->query("SELECT img FROM employees WHERE id='$id'");
    $row = $result->fetch_assoc();
    $filename = 'images/'.$row['img'];  
    unlink($filename);
   
    // Prepare the DELETE SQL query
    $query = "DELETE FROM employees WHERE id='$id'";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        // Redirect back to the list page after successful deletion
        header('Location: create.php');
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



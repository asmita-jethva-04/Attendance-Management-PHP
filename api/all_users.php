<?php
// Include the database configuration
include('../config.php');

// Set the header for JSON response
header("Content-Type: application/json; charset=UTF-8");

// Initialize an empty response array
$response = [];

// Try to execute the query and handle any potential errors
try {
    // SQL query to fetch all rows from the 'employees' table
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    // Check if the query returned results
    if ($result && $result->num_rows > 0) {
        $users = [];

        // Fetch each row as an associative array
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        // Prepare the success response
        $response = [
            "message" => "success",
            "data" => $users
        ];
    } else {
        // Handle the case where no data is found
        $response = [
            "message" => "No employees found",
            "data" => []
        ];
    }
} catch (Exception $e) {
    // Catch any errors and prepare the error response
    $response = [
        "message" => "An error occurred",
        "error" => $e->getMessage()
    ];
}

// Output the JSON response
echo json_encode($response);

// Close the database connection
$conn->close();

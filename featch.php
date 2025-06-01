    <?php
    header('Content-Type: application/json');

    include('config.php'); // Database connection

    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data); // Return all data as JSON

    ?>

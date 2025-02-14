<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set headers to allow cross-origin requests and specify JSON content type
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

try {
    $attractions = array();

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM productse WHERE active='Yes'"; // Corrected SQL query
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and add data to the $attractions array
        while ($row = $result->fetch_assoc()) {
            $attraction = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'detell' => $row['detell'],
                'imagfile' => $row['imagfile'],
                'active' => $row['active']
            );
            array_push($attractions, $attraction);
        }
        // Encode the $attractions array as JSON and echo it
        echo json_encode($attractions);
    } else {
        // If no rows returned, echo an empty array
        echo json_encode([]);
    }

    // Close the database connection
    $conn->close();
} catch (PDOException $e) {
    // Handle any errors that occur during execution
    echo "Error: " . $e->getMessage();
    die();
}
?>

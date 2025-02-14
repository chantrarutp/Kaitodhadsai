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
header("Content-Type: application/json; charset=UTF-8");

// Get the JSON data sent in the request body
$data = json_decode(file_get_contents("php://input"), true);

// Prepare and execute the SQL query to save the order
$stmt = $conn->prepare("INSERT INTO orders (product_id, prodeuct_name, quantity) VALUES (?, ?, ?)");
$stmt->bind_param("isi", $productId, $prodeuctName, $quantity);

foreach ($data['cart'] as $item) {
    $productId = $item['product_id'];
    $prodeuctName = $item['prodeuct_name'];
    $quantity = $item['quantity'];
    $stmt->execute();
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Respond with a success message
echo json_encode(array("message" => "Order saved successfully"));
?>

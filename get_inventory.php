<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch inventory items
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

// Array to store inventory items
$inventory = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch each row and add it to the inventory array
    while($row = $result->fetch_assoc()) {
        $inventory[] = $row;
    }
}

// Close the database connection
$conn->close();

// Set the response header to JSON
header('Content-Type: application/json');

// Output the inventory data as JSON
echo json_encode($inventory);

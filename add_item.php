<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$itemName = $_POST['itemName'];
$quantity = $_POST['quantity'];
$reorderLevel = $_POST['reorderLevel'];

// Insert data into database
$sql = "INSERT INTO inventory (itemName, quantity, reorderLevel) VALUES ('$itemName', '$quantity', '$reorderLevel')";

if ($conn->query($sql) === TRUE) {
    echo "New item added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

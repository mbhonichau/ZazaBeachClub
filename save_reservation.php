<?php
// Establish a connection to the Microsoft Access database
$conn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=D:\Users\M-COSBY\Documents\ICT_files\INS III\Web_Des\ZAZA\database;");

// Prepare the SQL statement
$sql = "INSERT INTO Reservation_Management (Name, Date, Time, Guests) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Get form data
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

// Execute the prepared statement
$stmt->execute([$name, $date, $time, $guests]);

// Close the database connection
$conn = null;

// Redirect back to the reservations page
header("Location: Reservations.html");
exit();
?>
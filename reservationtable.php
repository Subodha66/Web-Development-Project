<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$dbname = "delish_dining"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected table number and time
    $table_number = $_POST['table'];
    $reservation_time = $_POST['time'];

    // Prepare and bind the SQL query
    $stmt = $conn->prepare("INSERT INTO reservationtable (table_number, reservation_time) VALUES (?, ?)");
    $stmt->bind_param("is", $table_number, $reservation_time);

    // Execute the query
    if ($stmt->execute()) {
        echo "Reservation saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

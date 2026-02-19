<?php
$conn = new mysqli('localhost', 'root', '', 'delish_dining');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$responseMessage = "";  // Variable to store response message

if (
    isset($_POST['members']) && isset($_POST['date']) &&
    isset($_POST['name']) && isset($_POST['address']) &&
    isset($_POST['tableno']) && isset($_POST['phoneno'])
) {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $tableno = intval($_POST['tableno']);
    $phoneno = $conn->real_escape_string($_POST['phoneno']);
    $members = intval($_POST['members']);
    $date = $_POST['date'];

    if (empty($name) || empty($address) || empty($phoneno)) {
        $responseMessage = "Please fill out all fields.";
    } elseif ($tableno <= 0) {
        $responseMessage = "Please enter a valid table number.";
    } elseif ($members <= 0) {
        $responseMessage = "Please enter a valid number of members.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
        $responseMessage = "Invalid date format. Please use YYYY-MM-DD.";
    } elseif (strtotime($date) < strtotime(date("Y-m-d"))) {
        $responseMessage = "Reservation date cannot be in the past.";
    } else {
        $sql = "INSERT INTO `reservation`(`name`, `address`, `tableno`, `phoneno`, `No.Members`, `Date`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssisis", $name, $address, $tableno, $phoneno, $members, $date);
            if ($stmt->execute()) {
                $responseMessage = "Your reservation for $members members on $date has been saved.";
            } else {
                $responseMessage = "Error executing query: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $responseMessage = "Error preparing statement: " . $conn->error;
        }
    }
} else {
    $responseMessage = "No data received or form not submitted correctly.";
}

$conn->close();
echo json_encode(['message' => $responseMessage]);  // Return response message as JSON
?>

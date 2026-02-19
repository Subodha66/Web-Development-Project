<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "reservation");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Correct query with backticks for columns
$query = "SELECT `Date`, `No.Members` FROM reservation";

// Execute the query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>
            <tr>
                <th>Date</th>
                <th>No. of Members</th>
            </tr>";
    
    // Output the data in table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Date"] . "</td>
                <td>" . $row["No.Members"] . "</td>
              </tr>";
    }
    
    // Close the table
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>

<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'delish_dining');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// If there are orders, display the bill
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assign the fetched data to variables
        $name = $row['name'];
        $telNo = $row['telNo'];
        $soup = $row['soup'];
        $mainDishes = $row['mainDishes'];
        $beverage = $row['beverage'];

        // Quantities for each item
        $chickenSoupQty = $row['chickenSoupQty'];
        $vegetableSoupQty = $row['vegetableSoupQty'];
        $leekAndPotatoSoupQty = $row['leekAndPotatoSoupQty'];
        $chickenCreamSoupQty = $row['chickenCreamSoupQty'];
        $chickenCurryQty = $row['chickenCurryQty'];
        $beefSteakQty = $row['beefSteakQty'];
        $pastaAlfredoQty = $row['pastaAlfredoQty'];
        $grilledSalmonQty = $row['grilledSalmonQty'];
        $vegBiryaniQty = $row['vegBiryaniQty'];
        $pizzaMargheritaQty = $row['pizzaMargheritaQty'];
        $fishAndChipsQty = $row['fishAndChipsQty'];
        $spaghettiCarbonaraQty = $row['spaghettiCarbonaraQty'];
        $chickenFriedRiceQty = $row['chickenFriedRiceQty'];
        $lambChopsQty = $row['lambChopsQty'];

        // Displaying the bill
        echo "
        <div class='bill'>
            <h2>Order Bill</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Contact:</strong> $telNo</p>
            <p><strong>Soup:</strong> $soup</p>
            <p><strong>Main Dishes:</strong> $mainDishes</p>
            <p><strong>Beverage:</strong> $beverage</p>
            
            <h3>Order Summary:</h3>
            <table>
                <tr><th>Item</th><th>Quantity</th></tr>
                <tr><td>Chicken Soup</td><td>$chickenSoupQty</td></tr>
                <tr><td>Vegetable Soup</td><td>$vegetableSoupQty</td></tr>
                <tr><td>Leek and Potato Soup</td><td>$leekAndPotatoSoupQty</td></tr>
                <tr><td>Chicken Cream Soup</td><td>$chickenCreamSoupQty</td></tr>
                <tr><td>Chicken Curry</td><td>$chickenCurryQty</td></tr>
                <tr><td>Beef Steak</td><td>$beefSteakQty</td></tr>
                <tr><td>Pasta Alfredo</td><td>$pastaAlfredoQty</td></tr>
                <tr><td>Grilled Salmon</td><td>$grilledSalmonQty</td></tr>
                <tr><td>Veg Biryani</td><td>$vegBiryaniQty</td></tr>
                <tr><td>Pizza Margherita</td><td>$pizzaMargheritaQty</td></tr>
                <tr><td>Fish and Chips</td><td>$fishAndChipsQty</td></tr>
                <tr><td>Spaghetti Carbonara</td><td>$spaghettiCarbonaraQty</td></tr>
                <tr><td>Chicken Fried Rice</td><td>$chickenFriedRiceQty</td></tr>
                <tr><td>Lamb Chops</td><td>$lambChopsQty</td></tr>
            </table>
        </div>
        ";
    }
} else {
    echo "<p>No orders found.</p>";
}

// Close the database connection
$conn->close();
?>

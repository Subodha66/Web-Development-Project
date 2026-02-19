<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure that each field exists in the $_POST array before accessing it
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $telNo = isset($_POST['telNo']) ? $_POST['telNo'] : '';
    $soup = isset($_POST['soup']) ? implode(", ", $_POST['soup']) : '';  // Convert array to string
    $mainDishes = isset($_POST['mainDishes']) ? implode(", ", $_POST['mainDishes']) : '';  // Convert array to string
    $beverage = isset($_POST['beverage']) ? implode(", ", $_POST['beverage']) : NULL;  // Convert array to string

    // Get quantities for each selected item
    $chickenSoupQty = isset($_POST['chickenSoupQty']) ? $_POST['chickenSoupQty'] : 0;
    $vegetableSoupQty = isset($_POST['vegetableSoupQty']) ? $_POST['vegetableSoupQty'] : 0;
    $leekAndPotatoSoupQty = isset($_POST['leekAndPotatoSoupQty']) ? $_POST['leekAndPotatoSoupQty'] : 0;
    $chickenCreamSoupQty = isset($_POST['chickenCreamSoupQty']) ? $_POST['chickenCreamSoupQty'] : 0;

    $chickenCurryQty = isset($_POST['chickenCurryQty']) ? $_POST['chickenCurryQty'] : 0;
    $beefSteakQty = isset($_POST['beefSteakQty']) ? $_POST['beefSteakQty'] : 0;
    $pastaAlfredoQty = isset($_POST['pastaAlfredoQty']) ? $_POST['pastaAlfredoQty'] : 0;
    $grilledSalmonQty = isset($_POST['grilledSalmonQty']) ? $_POST['grilledSalmonQty'] : 0;
    $vegBiryaniQty = isset($_POST['vegBiryaniQty']) ? $_POST['vegBiryaniQty'] : 0;
    $pizzaMargheritaQty = isset($_POST['pizzaMargheritaQty']) ? $_POST['pizzaMargheritaQty'] : 0;
    $fishAndChipsQty = isset($_POST['fishAndChipsQty']) ? $_POST['fishAndChipsQty'] : 0;
    $spaghettiCarbonaraQty = isset($_POST['spaghettiCarbonaraQty']) ? $_POST['spaghettiCarbonaraQty'] : 0;
    $chickenFriedRiceQty = isset($_POST['chickenFriedRiceQty']) ? $_POST['chickenFriedRiceQty'] : 0;
    $lambChopsQty = isset($_POST['lambChopsQty']) ? $_POST['lambChopsQty'] : 0;

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'delish_dining');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the form data into the database
    $sql = "INSERT INTO orders (name, telNo, soup, mainDishes, beverage, chickenSoupQty, vegetableSoupQty, leekAndPotatoSoupQty, chickenCreamSoupQty,
            chickenCurryQty, beefSteakQty, pastaAlfredoQty, grilledSalmonQty, vegBiryaniQty, pizzaMargheritaQty, fishAndChipsQty, 
            spaghettiCarbonaraQty, chickenFriedRiceQty, lambChopsQty) 
            VALUES ('$name', '$telNo', '$soup', '$mainDishes', '$beverage', '$chickenSoupQty', '$vegetableSoupQty', '$leekAndPotatoSoupQty', '$chickenCreamSoupQty',
            '$chickenCurryQty', '$beefSteakQty', '$pastaAlfredoQty', '$grilledSalmonQty', '$vegBiryaniQty', '$pizzaMargheritaQty', 
            '$fishAndChipsQty', '$spaghettiCarbonaraQty', '$chickenFriedRiceQty', '$lambChopsQty')";

    if ($conn->query($sql) === TRUE) {
        // Success: Display a table of selected items
        echo "<h2>Order Summary</h2>";
        echo "<div style='font-family: Arial, sans-serif; color: #333; padding: 20px;'>";
        echo "<h3 style='color: #27ae60;'>Thank you for your order, $name!</h3>";

        echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>";
        echo "<thead style='background-color: #2c3e50; color: #fff;'>
                <tr>
                    <th style='padding: 10px; text-align: left;'>Item</th>
                    <th style='padding: 10px; text-align: left;'>Quantity</th>
                </tr>
              </thead>";
        echo "<tbody style='background-color: #ecf0f1;'>";

        // Display selected soups and their quantities
        if ($chickenSoupQty > 0) echo "<tr><td style='padding: 10px;'>Chicken Soup</td><td style='padding: 10px;'>$chickenSoupQty</td></tr>";
        if ($vegetableSoupQty > 0) echo "<tr><td style='padding: 10px;'>Vegetable Soup</td><td style='padding: 10px;'>$vegetableSoupQty</td></tr>";
        if ($leekAndPotatoSoupQty > 0) echo "<tr><td style='padding: 10px;'>Leek and Potato Soup</td><td style='padding: 10px;'>$leekAndPotatoSoupQty</td></tr>";
        if ($chickenCreamSoupQty > 0) echo "<tr><td style='padding: 10px;'>Chicken Cream Soup</td><td style='padding: 10px;'>$chickenCreamSoupQty</td></tr>";

        // Display selected main dishes and their quantities
        if ($chickenCurryQty > 0) echo "<tr><td style='padding: 10px;'>Chicken Curry</td><td style='padding: 10px;'>$chickenCurryQty</td></tr>";
        if ($beefSteakQty > 0) echo "<tr><td style='padding: 10px;'>Beef Steak</td><td style='padding: 10px;'>$beefSteakQty</td></tr>";
        if ($pastaAlfredoQty > 0) echo "<tr><td style='padding: 10px;'>Pasta Alfredo</td><td style='padding: 10px;'>$pastaAlfredoQty</td></tr>";
        if ($grilledSalmonQty > 0) echo "<tr><td style='padding: 10px;'>Grilled Salmon</td><td style='padding: 10px;'>$grilledSalmonQty</td></tr>";
        if ($vegBiryaniQty > 0) echo "<tr><td style='padding: 10px;'>Veg Biryani</td><td style='padding: 10px;'>$vegBiryaniQty</td></tr>";
        if ($pizzaMargheritaQty > 0) echo "<tr><td style='padding: 10px;'>Pizza Margherita</td><td style='padding: 10px;'>$pizzaMargheritaQty</td></tr>";
        if ($fishAndChipsQty > 0) echo "<tr><td style='padding: 10px;'>Fish and Chips</td><td style='padding: 10px;'>$fishAndChipsQty</td></tr>";
        if ($spaghettiCarbonaraQty > 0) echo "<tr><td style='padding: 10px;'>Spaghetti Carbonara</td><td style='padding: 10px;'>$spaghettiCarbonaraQty</td></tr>";
        if ($chickenFriedRiceQty > 0) echo "<tr><td style='padding: 10px;'>Chicken Fried Rice</td><td style='padding: 10px;'>$chickenFriedRiceQty</td></tr>";
        if ($lambChopsQty > 0) echo "<tr><td style='padding: 10px;'>Lamb Chops</td><td style='padding: 10px;'>$lambChopsQty</td></tr>";

        // Display selected beverages
        if ($beverage) echo "<tr><td style='padding: 10px;'>Beverages</td><td style='padding: 10px;'>$beverage</td></tr>";

        echo "</tbody></table>";

        echo "<p style='font-size: 18px; color: #7f8c8d;'>Your order will be processed shortly. Thank you for dining with us!</p>";
        echo "</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

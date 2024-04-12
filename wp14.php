<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Medical Supply Request</title>
<style>
/* CSS Styling */
input[type=text], input[type=number], input[type=date] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    padding: 20px;
}

.error {
    color: red;
}
</style>
<script>
// JavaScript Validation
function validateForm() {
    var quantityToRequest = document.getElementById("quantity_to_request").value.trim();
    var estimatedDeliveryDate = document.getElementById("estimated_delivery_date").value.trim();
    
    if (quantityToRequest === "" || estimatedDeliveryDate === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(quantityToRequest) || parseInt(quantityToRequest) <= 0) {
        alert("Please enter a valid quantity to request.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Medical Supply Request</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="supply_name">Supply Name:</label>
        <input type="text" id="supply_name" name="supply_name" required><br>
        
        <label for="current_quantity">Current Quantity:</label>
        <input type="number" id="current_quantity" name="current_quantity" value="0" readonly><br>
        
        <label for="quantity_to_request">Quantity to Request:</label>
        <input type="number" id="quantity_to_request" name="quantity_to_request" min="1" required><br>
        
        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier" required><br>
        
        <label for="estimated_delivery_date">Estimated Delivery Date:</label>
        <input type="date" id="estimated_delivery_date" name="estimated_delivery_date" required><br>
        
        <input type="submit" value="Request">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplyName = $_POST['supply_name'];
    $currentQuantity = $_POST['current_quantity'];
    $quantityToRequest = $_POST['quantity_to_request'];
    $supplier = $_POST['supplier'];
    $estimatedDeliveryDate = $_POST['estimated_delivery_date'];
    
    // Update current quantity
    $newQuantity = $currentQuantity + $quantityToRequest;

    // Display confirmation message
    echo "<div class='container'>";
    echo "<h2>Supply Request Confirmation</h2>";
    echo "<p>Supply Name: $supplyName</p>";
    echo "<p>Current Quantity: $currentQuantity</p>";
    echo "<p>Quantity to Request: $quantityToRequest</p>";
    echo "<p>Supplier: $supplier</p>";
    echo "<p>Estimated Delivery Date: $estimatedDeliveryDate</p>";
    echo "<p>Supply request submitted successfully.</p>";
    echo "<p>New Quantity: $newQuantity</p>";
    echo "</div>";
}
?>

</body>
</html>

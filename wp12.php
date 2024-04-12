<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Equipment Rental Management</title>
<style>
/* CSS Styling */
input[type=text], input[type=number] {
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
    var quantityToRent = document.getElementById("quantity_to_rent").value.trim();
    var rentalDuration = document.getElementById("rental_duration").value.trim();
    
    if (quantityToRent === "" || rentalDuration === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(quantityToRent) || parseInt(quantityToRent) <= 0) {
        alert("Please enter a valid quantity to rent.");
        return false;
    }
    
    if (isNaN(rentalDuration) || parseInt(rentalDuration) <= 0) {
        alert("Please enter a valid rental duration.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Equipment Rental Management</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="equipment_name">Equipment Name:</label>
        <input type="text" id="equipment_name" name="equipment_name" required><br>
        
        <label for="available_quantity">Available Quantity:</label>
        <input type="number" id="available_quantity" name="available_quantity" value="0" readonly><br>
        
        <label for="quantity_to_rent">Quantity to Rent:</label>
        <input type="number" id="quantity_to_rent" name="quantity_to_rent" min="1" required><br>
        
        <label for="rental_duration">Rental Duration (days):</label>
        <input type="number" id="rental_duration" name="rental_duration" min="1" required><br>
        
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>
        
        <input type="submit" value="Rent">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentName = $_POST['equipment_name'];
    $availableQuantity = $_POST['available_quantity'];
    $quantityToRent = $_POST['quantity_to_rent'];
    $rentalDuration = $_POST['rental_duration'];
    $customerName = $_POST['customer_name'];
    
    // Update available quantity
    $newQuantity = $availableQuantity - $quantityToRent;

    // Calculate rental fee
    // For demonstration purposes, let's assume a fixed fee per day per equipment unit
    $rentalFeePerDayPerUnit = 10; // Change this value as needed
    $totalRentalFee = $rentalFeePerDayPerUnit * $quantityToRent * $rentalDuration;

    // Display confirmation message
    echo "<div class='container'>";
    echo "<h2>Rental Confirmation</h2>";
    echo "<p>Equipment Name: $equipmentName</p>";
    echo "<p>Available Quantity: $availableQuantity</p>";
    echo "<p>Quantity to Rent: $quantityToRent</p>";
    echo "<p>Rental Duration: $rentalDuration days</p>";
    echo "<p>Customer Name: $customerName</p>";
    echo "<p>Total Rental Fee: $totalRentalFee</p>";
    echo "<p>Equipment successfully rented.</p>";
    echo "</div>";
}
?>

</body>
</html>

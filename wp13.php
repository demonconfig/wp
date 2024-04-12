<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ingredient Inventory Management</title>
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
    var quantityToOrder = document.getElementById("quantity_to_order").value.trim();
    var costPerUnit = document.getElementById("cost_per_unit").value.trim();
    
    if (quantityToOrder === "" || costPerUnit === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(quantityToOrder) || parseInt(quantityToOrder) <= 0) {
        alert("Please enter a valid quantity to order.");
        return false;
    }
    
    if (isNaN(costPerUnit) || parseFloat(costPerUnit) <= 0) {
        alert("Please enter a valid cost per unit.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Ingredient Inventory Management</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="ingredient_name">Ingredient Name:</label>
        <input type="text" id="ingredient_name" name="ingredient_name" required><br>
        
        <label for="current_quantity">Current Quantity:</label>
        <input type="number" id="current_quantity" name="current_quantity" value="0" readonly><br>
        
        <label for="quantity_to_order">Quantity to Order:</label>
        <input type="number" id="quantity_to_order" name="quantity_to_order" min="1" required><br>
        
        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier" required><br>
        
        <label for="cost_per_unit">Cost Per Unit:</label>
        <input type="number" id="cost_per_unit" name="cost_per_unit" min="0.01" step="0.01" required><br>
        
        <input type="submit" value="Order">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredientName = $_POST['ingredient_name'];
    $currentQuantity = $_POST['current_quantity'];
    $quantityToOrder = $_POST['quantity_to_order'];
    $supplier = $_POST['supplier'];
    $costPerUnit = $_POST['cost_per_unit'];
    
    // Calculate total cost
    $totalCost = $quantityToOrder * $costPerUnit;
    
    // Update current quantity
    $newQuantity = $currentQuantity + $quantityToOrder;

    // Display confirmation message
    echo "<div class='container'>";
    echo "<h2>Stock Order Confirmation</h2>";
    echo "<p>Ingredient Name: $ingredientName</p>";
    echo "<p>Current Quantity: $currentQuantity</p>";
    echo "<p>Quantity to Order: $quantityToOrder</p>";
    echo "<p>Supplier: $supplier</p>";
    echo "<p>Cost Per Unit: $costPerUnit</p>";
    echo "<p>Total Cost: $totalCost</p>";
    echo "<p>New Quantity: $newQuantity</p>";
    echo "<p>Stock successfully ordered.</p>";
    echo "</div>";
}
?>

</body>
</html>

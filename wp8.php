<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Inventory Tracker</title>
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
    var productName = document.getElementById("product_name").value.trim();
    var quantityInStock = document.getElementById("quantity_in_stock").value.trim();
    var newStockQuantity = document.getElementById("new_stock_quantity").value.trim();
    var supplier = document.getElementById("supplier").value.trim();
    var costPerUnit = document.getElementById("cost_per_unit").value.trim();
    
    if (productName === "" || quantityInStock === "" || newStockQuantity === "" || supplier === "" || costPerUnit === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(quantityInStock) || parseInt(quantityInStock) < 0 || isNaN(newStockQuantity) || parseInt(newStockQuantity) < 0 || isNaN(costPerUnit) || parseFloat(costPerUnit) < 0) {
        alert("Please enter valid numeric values for quantity fields and cost per unit.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Product Inventory Tracker</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>
        
        <label for="quantity_in_stock">Quantity In Stock:</label>
        <input type="number" id="quantity_in_stock" name="quantity_in_stock" min="0" required><br>
        
        <label for="new_stock_quantity">New Stock Quantity:</label>
        <input type="number" id="new_stock_quantity" name="new_stock_quantity" min="0" required><br>
        
        <label for="supplier">Supplier:</label>
        <input type="text" id="supplier" name="supplier" required><br>
        
        <label for="cost_per_unit">Cost Per Unit:</label>
        <input type="number" id="cost_per_unit" name="cost_per_unit" min="0" step="0.01" required><br>
        
        <input type="submit" value="Update Inventory">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];
    $quantityInStock = $_POST['quantity_in_stock'];
    $newStockQuantity = $_POST['new_stock_quantity'];
    $supplier = $_POST['supplier'];
    $costPerUnit = $_POST['cost_per_unit'];
    
    // Calculating updated inventory level
    $updatedInventoryLevel = $quantityInStock + $newStockQuantity;
    
    // Calculating total cost of new stock
    $totalCost = $newStockQuantity * $costPerUnit;

    // Displaying updated inventory details
    echo "<div class='container'>";
    echo "<h2>Inventory Update Confirmation</h2>";
    echo "<p>Product Name: $productName</p>";
    echo "<p>Current Quantity In Stock: $quantityInStock</p>";
    echo "<p>New Stock Quantity: $newStockQuantity</p>";
    echo "<p>Supplier: $supplier</p>";
    echo "<p>Cost Per Unit: $costPerUnit</p>";
    echo "<p>Updated Inventory Level: $updatedInventoryLevel</p>";
    echo "<p>Total Cost of New Stock: $totalCost</p>";
    echo "<p>Inventory updated successfully!</p>";
    echo "</div>";
}
?>

</body>
</html>

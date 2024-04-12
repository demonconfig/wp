<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Order Form</title>
<style>
/* CSS Styling */
input[type=text], input[type=number] {
    width: 200px;
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
    var title = document.getElementById("title").value.trim();
    var author = document.getElementById("author").value.trim();
    var price = document.getElementById("price").value.trim();
    var quantity = document.getElementById("quantity").value.trim();
    
    if (title === "" || author === "" || price === "" || quantity === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(price) || parseFloat(price) <= 0) {
        alert("Please enter a valid price greater than zero.");
        return false;
    }
    
    if (isNaN(quantity) || parseInt(quantity) < 1 || parseInt(quantity) > 10) {
        alert("Please enter a valid quantity between 1 and 10.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Book Order Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="10" required><br>
        
        <input type="submit" value="Order">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $totalCost = $price * $quantity;

    // Displaying order details
    echo "<div class='container'>";
    echo "<h2>Order Confirmation</h2>";
    echo "<p>Book Title: $title</p>";
    echo "<p>Author: $author</p>";
    echo "<p>Price: $price</p>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>Total Cost: $totalCost</p>";
    echo "<p>Thank you for your order!</p>";
    echo "</div>";
}
?>

</body>
</html>

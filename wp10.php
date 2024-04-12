<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Comparison and Recommendation</title>
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
    var productName1 = document.getElementById("product_name_1").value.trim();
    var productPrice1 = document.getElementById("product_price_1").value.trim();
    var productRating1 = document.getElementById("product_rating_1").value.trim();
    var productName2 = document.getElementById("product_name_2").value.trim();
    var productPrice2 = document.getElementById("product_price_2").value.trim();
    var productRating2 = document.getElementById("product_rating_2").value.trim();
    
    if (productName1 === "" || productPrice1 === "" || productRating1 === "" || productName2 === "" || productPrice2 === "" || productRating2 === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(productPrice1) || isNaN(productPrice2) || parseFloat(productPrice1) <= 0 || parseFloat(productPrice2) <= 0) {
        alert("Please enter valid prices for both products.");
        return false;
    }
    
    if (isNaN(productRating1) || isNaN(productRating2) || parseFloat(productRating1) < 1 || parseFloat(productRating1) > 5 || parseFloat(productRating2) < 1 || parseFloat(productRating2) > 5) {
        alert("Please enter valid ratings between 1 and 5 for both products.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Product Comparison and Recommendation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="product_name_1">Product Name 1:</label>
        <input type="text" id="product_name_1" name="product_name_1" required><br>
        
        <label for="product_price_1">Product Price 1:</label>
        <input type="number" id="product_price_1" name="product_price_1" min="0" required><br>
        
        <label for="product_rating_1">Product Rating 1:</label>
        <input type="number" id="product_rating_1" name="product_rating_1" min="1" max="5" required><br>
        
        <label for="product_name_2">Product Name 2:</label>
        <input type="text" id="product_name_2" name="product_name_2" required><br>
        
        <label for="product_price_2">Product Price 2:</label>
        <input type="number" id="product_price_2" name="product_price_2" min="0" required><br>
        
        <label for="product_rating_2">Product Rating 2:</label>
        <input type="number" id="product_rating_2" name="product_rating_2" min="1" max="5" required><br>
        
        <input type="submit" value="Compare">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName1 = $_POST['product_name_1'];
    $productPrice1 = $_POST['product_price_1'];
    $productRating1 = $_POST['product_rating_1'];
    $productName2 = $_POST['product_name_2'];
    $productPrice2 = $_POST['product_price_2'];
    $productRating2 = $_POST['product_rating_2'];
    
    // Determine which product is cheaper or if they have the same price
    if ($productPrice1 < $productPrice2) {
        $cheaperProduct = $productName1;
    } elseif ($productPrice1 > $productPrice2) {
        $cheaperProduct = $productName2;
    } else {
        $cheaperProduct = "Both products have the same price.";
    }
    
    // Determine which product has a higher rating
    if ($productRating1 > $productRating2) {
        $higherRatedProduct = $productName1;
    } elseif ($productRating1 < $productRating2) {
        $higherRatedProduct = $productName2;
    } else {
        $higherRatedProduct = "Both products have the same rating.";
    }

    // Display comparison result and recommendations
    echo "<div class='container'>";
    echo "<h2>Comparison Result and Recommendations</h2>";
    echo "<p>Product Name 1: $productName1</p>";
    echo "<p>Product Price 1: $productPrice1</p>";
    echo "<p>Product Rating 1: $productRating1</p>";
    echo "<p>Product Name 2: $productName2</p>";
    echo "<p>Product Price 2: $productPrice2</p>";
    echo "<p>Product Rating 2: $productRating2</p>";
    echo "<p>Cheaper Product: $cheaperProduct</p>";
    echo "<p>Higher Rated Product: $higherRatedProduct</p>";
    echo "</div>";
}
?>

</body>
</html>

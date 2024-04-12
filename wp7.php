<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Review Submission</title>
<style>
/* CSS Styling */
input[type=text], input[type=email], textarea, select {
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
    var reviewerName = document.getElementById("reviewer_name").value.trim();
    var reviewerEmail = document.getElementById("reviewer_email").value.trim();
    var rating = document.getElementById("rating").value.trim();
    var reviewText = document.getElementById("review_text").value.trim();
    
    if (productName === "" || reviewerName === "" || reviewerEmail === "" || rating === "" || reviewText === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (!validateEmail(reviewerEmail)) {
        alert("Please enter a valid email address.");
        return false;
    }
    
    return true;
}

// Email Validation Function
function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
</script>
</head>
<body>
<div class="container">
    <h2>Product Review Submission</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>
        
        <label for="reviewer_name">Reviewer Name:</label>
        <input type="text" id="reviewer_name" name="reviewer_name" required><br>
        
        <label for="reviewer_email">Reviewer Email:</label>
        <input type="email" id="reviewer_email" name="reviewer_email" required><br>
        
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="">Select Rating</option>
            <option value="1">1 star</option>
            <option value="2">2 stars</option>
            <option value="3">3 stars</option>
            <option value="4">4 stars</option>
            <option value="5">5 stars</option>
        </select><br>
        
        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" rows="4" required></textarea><br>
        
        <input type="submit" value="Submit Review">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];
    $reviewerName = $_POST['reviewer_name'];
    $reviewerEmail = $_POST['reviewer_email'];
    $rating = $_POST['rating'];
    $reviewText = $_POST['review_text'];
    
    // Displaying review details
    echo "<div class='container'>";
    echo "<h2>Review Submission Confirmation</h2>";
    echo "<p>Product Name: $productName</p>";
    echo "<p>Reviewer Name: $reviewerName</p>";
    echo "<p>Reviewer Email: $reviewerEmail</p>";
    echo "<p>Rating: $rating stars</p>";
    echo "<p>Review Text: $reviewText</p>";
    echo "<p>Thank you for your review!</p>";
    echo "</div>";
}
?>

</body>
</html>

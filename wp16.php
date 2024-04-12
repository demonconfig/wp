<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vehicle Rental Reservation</title>
<style>
/* CSS Styling */
input[type=text], input[type=date], select {
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
    var pickupDate = document.getElementById("pickup_date").value.trim();
    var returnDate = document.getElementById("return_date").value.trim();
    
    if (pickupDate === "" || returnDate === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    var startDate = new Date(pickupDate);
    var endDate = new Date(returnDate);
    
    if (endDate <= startDate) {
        alert("Return date must be after pickup date.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Vehicle Rental Reservation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="vehicle_type">Vehicle Type:</label>
        <select id="vehicle_type" name="vehicle_type" required>
            <option value="">Select Type</option>
            <option value="Sedan">Sedan</option>
            <option value="SUV">SUV</option>
            <option value="Truck">Truck</option>
            <option value="Van">Van</option>
        </select><br>
        
        <label for="pickup_date">Pickup Date:</label>
        <input type="date" id="pickup_date" name="pickup_date" required><br>
        
        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required><br>
        
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>
        
        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br>
        
        <input type="submit" value="Reserve">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleType = $_POST['vehicle_type'];
    $pickupDate = $_POST['pickup_date'];
    $returnDate = $_POST['return_date'];
    $customerName = $_POST['customer_name'];
    $contactNumber = $_POST['contact_number'];
    
    // Calculate duration
    $start = strtotime($pickupDate);
    $end = strtotime($returnDate);
    $duration = ceil(($end - $start) / (60 * 60 * 24)); // in days
    
    // Display confirmation message
    echo "<div class='container'>";
    echo "<h2>Reservation Confirmation</h2>";
    echo "<p>Vehicle Type: $vehicleType</p>";
    echo "<p>Pickup Date: $pickupDate</p>";
    echo "<p>Return Date: $returnDate</p>";
    echo "<p>Customer Name: $customerName</p>";
    echo "<p>Contact Number: $contactNumber</p>";
    echo "<p>Rental Duration: $duration days</p>";
    echo "<p>Vehicle successfully reserved.</p>";
    echo "</div>";
}
?>

</body>
</html>

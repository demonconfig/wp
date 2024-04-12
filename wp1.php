<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dance Competition Registration Form</title>
<style>
/* CSS Styling */
input[type=text], input[type=password], input[type=email], input[type=tel], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
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
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var mobileRegex = /^[0-9]{10}$/;
    
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }
    
    if (!mobileRegex.test(mobile)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
    }
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Dance Competition Registration Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required><br>
        
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="error">Invalid email format</div>';
    }

    // Displaying registration data
    echo "<h2>Thank you for registering!</h2>";
    echo "<p>Username: $username</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Mobile: $mobile</p>";
    echo "<p>Gender: $gender</p>";
    echo "<p>Date of Birth: $dob</p>";
    echo "<p>Address: $address</p>";
}
?>

</body>
</html>

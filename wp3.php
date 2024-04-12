<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer Registration Form</title>
<style>
/* CSS Styling */
input[type=text], input[type=email], input[type=tel], select, textarea {
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
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var morning = document.getElementById("morning").checked;
    var afternoon = document.getElementById("afternoon").checked;
    var evening = document.getElementById("evening").checked;
    var weekend = document.getElementById("weekend").checked;
    
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }
    
    if (!morning && !afternoon && !evening && !weekend) {
        alert("Please select at least one availability option.");
        return false;
    }
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Volunteer Registration Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br>
        
        <label>Availability:</label><br>
        <input type="checkbox" id="morning" name="availability[]" value="Morning">
        <label for="morning">Morning</label><br>
        <input type="checkbox" id="afternoon" name="availability[]" value="Afternoon">
        <label for="afternoon">Afternoon</label><br>
        <input type="checkbox" id="evening" name="availability[]" value="Evening">
        <label for="evening">Evening</label><br>
        <input type="checkbox" id="weekend" name="availability[]" value="Weekend">
        <label for="weekend">Weekend</label><br>
        
        <label for="area_of_interest">Area of Interest:</label>
        <select id="area_of_interest" name="area_of_interest" required>
            <option value="">Please select</option>
            <option value="Event Setup">Event Setup</option>
            <option value="Registration">Registration</option>
            <option value="Clean-up">Clean-up</option>
            <option value="Other">Other</option>
        </select><br>
        
        <label for="additional_comments">Additional Comments:</label>
        <textarea id="additional_comments" name="additional_comments" rows="4" cols="50"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = implode(", ", $_POST['availability']);
    $area_of_interest = $_POST['area_of_interest'];
    $additional_comments = $_POST['additional_comments'];

    // Displaying registration data
    echo "<h2>Thank you for volunteering!</h2>";
    echo "<p>Full Name: $fullname</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone Number: $phone</p>";
    echo "<p>Availability: $availability</p>";
    echo "<p>Area of Interest: $area_of_interest</p>";
    echo "<p>Additional Comments: $additional_comments</p>";
}
?>

</body>
</html>

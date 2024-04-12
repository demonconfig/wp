<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Workshop Registration Form</title>
<style>
/* CSS Styling */
input[type=text], input[type=email], input[type=tel], textarea, select {
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
    var workshopDate = document.getElementById("workshop_date").value;
    var currentDate = new Date();
    var selectedDate = new Date(workshopDate);
    
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }
    
    if (selectedDate < currentDate) {
        alert("Workshop date cannot be in the past.");
        return false;
    }
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Workshop Registration Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="company">Company Name:</label>
        <input type="text" id="company" name="company" required><br>
        
        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br>
        
        <label for="workshop_date">Workshop Date:</label>
        <input type="date" id="workshop_date" name="workshop_date" required><br>
        
        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="attendees" min="1" required><br>
        
        <label for="special_requests">Special Requests:</label>
        <textarea id="special_requests" name="special_requests" rows="4" cols="50"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $job_title = $_POST['job_title'];
    $phone = $_POST['phone'];
    $workshop_date = $_POST['workshop_date'];
    $attendees = $_POST['attendees'];
    $special_requests = $_POST['special_requests'];

    // Displaying registration data
    echo "<h2>Thank you for registering!</h2>";
    echo "<p>Full Name: $fullname</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Company: $company</p>";
    echo "<p>Job Title: $job_title</p>";
    echo "<p>Phone Number: $phone</p>";
    echo "<p>Workshop Date: $workshop_date</p>";
    echo "<p>Number of Attendees: $attendees</p>";
    echo "<p>Special Requests: $special_requests</p>";
}
?>

</body>
</html>

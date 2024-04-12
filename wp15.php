<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conference Room Reservation</title>
<style>
/* CSS Styling */
input[type=text], input[type=date], input[type=time] {
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
    var startTime = document.getElementById("start_time").value.trim();
    var endTime = document.getElementById("end_time").value.trim();
    
    if (startTime === "" || endTime === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    var startDate = new Date(document.getElementById("reservation_date").value + " " + startTime);
    var endDate = new Date(document.getElementById("reservation_date").value + " " + endTime);
    
    if (endDate <= startDate) {
        alert("End time must be after start time.");
        return false;
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Conference Room Reservation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="room_name">Room Name:</label>
        <input type="text" id="room_name" name="room_name" required><br>
        
        <label for="reservation_date">Reservation Date:</label>
        <input type="date" id="reservation_date" name="reservation_date" required><br>
        
        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time" name="start_time" required><br>
        
        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" required><br>
        
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name" required><br>
        
        <label for="reason_for_reservation">Reason for Reservation:</label>
        <input type="text" id="reason_for_reservation" name="reason_for_reservation" required><br>
        
        <input type="submit" value="Reserve">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomName = $_POST['room_name'];
    $reservationDate = $_POST['reservation_date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];
    $employeeName = $_POST['employee_name'];
    $reasonForReservation = $_POST['reason_for_reservation'];
    
    // Calculate duration
    $start = strtotime($startTime);
    $end = strtotime($endTime);
    $duration = ($end - $start) / 3600; // in hours
    
    // Display confirmation message
    echo "<div class='container'>";
    echo "<h2>Reservation Confirmation</h2>";
    echo "<p>Room Name: $roomName</p>";
    echo "<p>Reservation Date: $reservationDate</p>";
    echo "<p>Start Time: $startTime</p>";
    echo "<p>End Time: $endTime</p>";
    echo "<p>Employee Name: $employeeName</p>";
    echo "<p>Reason for Reservation: $reasonForReservation</p>";
    echo "<p>Duration: $duration hours</p>";
    echo "<p>Room successfully reserved.</p>";
    echo "</div>";
}
?>

</body>
</html>

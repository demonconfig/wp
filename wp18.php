<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fitness Tracker</title>
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

.calorie-results {
    font-weight: bold;
    margin-top: 10px;
}
</style>
<script>
// JavaScript Validation
function validateDuration(input) {
    var regex = /^\d+$/; // Allows positive integers only
    return regex.test(input.value);
}
</script>
</head>
<body>
<div class="container">
    <h2>Fitness Tracker</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="activity_type">Activity Type:</label>
        <select id="activity_type" name="activity_type">
            <option value="running">Running</option>
            <option value="walking">Walking</option>
            <option value="cycling">Cycling</option>
        </select><br>
        
        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" min="1" required oninput="validateDuration(this)"><br>
        
        <label>Intensity Level:</label><br>
        <input type="radio" id="low" name="intensity" value="low" checked>
        <label for="low">Low</label><br>
        <input type="radio" id="moderate" name="intensity" value="moderate">
        <label for="moderate">Moderate</label><br>
        <input type="radio" id="high" name="intensity" value="high">
        <label for="high">High</label><br>
        
        <input type="submit" value="Add Activity">
    </form>
    
    <h2>Calorie Intake Goal</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="calorie_goal">Calorie Intake Goal:</label>
        <input type="number" id="calorie_goal" name="calorie_goal" min="1" required><br>
        
        <input type="submit" value="Calculate">
        
        <?php
        // PHP Integration
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process calorie calculation
            $activities = [
                "running" => 10, // Calories burned per minute for running
                "walking" => 5,  // Calories burned per minute for walking
                "cycling" => 8   // Calories burned per minute for cycling
            ];
            
            $totalCalories = 0;
            $duration = intval($_POST['duration']);
            $activityType = $_POST['activity_type'];
            $intensity = $_POST['intensity'];
            
            // Calculate calories burned for the activity
            if (array_key_exists($activityType, $activities)) {
                $caloriesBurned = $activities[$activityType] * $duration;
                
                // Adjust calories burned based on intensity level
                if ($intensity == "moderate") {
                    $caloriesBurned *= 1.5;
                } elseif ($intensity == "high") {
                    $caloriesBurned *= 2;
                }
                
                $totalCalories += $caloriesBurned;
            }
            
            echo "<div class='calorie-results'>Total Calorie Intake: $totalCalories</div>";
            
            // Calculate remaining calorie goal
            $calorieGoal = intval($_POST['calorie_goal']);
            $remainingCalories = $calorieGoal - $totalCalories;
            
            echo "<div class='calorie-results'>Remaining Calorie Goal: $remainingCalories</div>";
        }
        ?>
    </form>
</div>
</body>
</html>

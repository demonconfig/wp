<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meal Planner with Nutrition Calculation</title>
<style>
/* CSS Styling */
input[type=text] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type=number] {
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
</style>
<script>
// JavaScript Validation
function validateInput(input) {
    var regex = /^\d+(\.\d+)?$/; // Allows numerical values
    return regex.test(input.value);
}
</script>
</head>
<body>
<div class="container">
    <h2>Meal Planner with Nutrition Calculation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="meal_name">Meal Name:</label>
        <input type="text" id="meal_name" name="meal_name" required><br>
        
        <label for="calories">Calories:</label>
        <input type="number" id="calories" name="calories" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <label for="protein">Protein (g):</label>
        <input type="number" id="protein" name="protein" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <label for="carbohydrates">Carbohydrates (g):</label>
        <input type="number" id="carbohydrates" name="carbohydrates" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <label for="fat">Fat (g):</label>
        <input type="number" id="fat" name="fat" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <input type="submit" value="Calculate">
    </form>
    
    <h2>Nutritional Content</h2>
    <div class="result">
        <?php
        // PHP Integration
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process meal data
            $meal_name = $_POST['meal_name'];
            $calories = floatval($_POST['calories']);
            $protein = floatval($_POST['protein']);
            $carbohydrates = floatval($_POST['carbohydrates']);
            $fat = floatval($_POST['fat']);
            
            // Calculate total nutritional content
            $total_calories += $calories;
            $total_protein += $protein;
            $total_carbohydrates += $carbohydrates;
            $total_fat += $fat;
            
            echo "<div>Meal Name: $meal_name</div>";
            echo "<div>Calories: $calories</div>";
            echo "<div>Protein: $protein g</div>";
            echo "<div>Carbohydrates: $carbohydrates g</div>";
            echo "<div>Fat: $fat g</div>";
        }
        ?>
    </div>
    
    <h2>Total Nutritional Intake</h2>
    <div class="result">
        <?php
        if (isset($total_calories)) {
            echo "<div>Total Calories: $total_calories</div>";
            echo "<div>Total Protein: $total_protein g</div>";
            echo "<div>Total Carbohydrates: $total_carbohydrates g</div>";
            echo "<div>Total Fat: $total_fat g</div>";
        }
        ?>
    </div>
</div>
</body>
</html>

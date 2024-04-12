<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Investment Portfolio Tracker</title>
<style>
/* CSS Styling */
input[type=text], input[type=number], input[type=date] {
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

.result {
    font-weight: bold;
    margin-top: 10px;
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
    <h2>Investment Portfolio Tracker</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="investment_name">Investment Name:</label>
        <input type="text" id="investment_name" name="investment_name" required><br>
        
        <label for="investment_amount">Investment Amount:</label>
        <input type="number" id="investment_amount" name="investment_amount" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <label for="investment_date">Investment Date:</label>
        <input type="date" id="investment_date" name="investment_date" required><br>
        
        <label for="current_value">Current Value:</label>
        <input type="number" id="current_value" name="current_value" min="0" step="0.01" required oninput="validateInput(this)"><br>
        
        <input type="submit" value="Add Investment">
    </form>
    
    <h2>Portfolio Summary</h2>
    <div class="summary">
        <?php
        // PHP Integration
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process investment data
            $investment_name = $_POST['investment_name'];
            $investment_amount = floatval($_POST['investment_amount']);
            $investment_date = $_POST['investment_date'];
            $current_value = floatval($_POST['current_value']);
            
            echo "<div class='result'>Investment Name: $investment_name</div>";
            echo "<div class='result'>Investment Amount: $investment_amount</div>";
            echo "<div class='result'>Investment Date: $investment_date</div>";
            echo "<div class='result'>Current Value: $current_value</div>";
            
            // Calculate total investment amount
            $total_investment = $investment_amount;
            if (isset($_SESSION['total_investment'])) {
                $total_investment += $_SESSION['total_investment'];
            }
            $_SESSION['total_investment'] = $total_investment;
            echo "<div class='result'>Total Investment Amount: $total_investment</div>";
            
            // Calculate total current value
            $total_current_value = $current_value;
            if (isset($_SESSION['total_current_value'])) {
                $total_current_value += $_SESSION['total_current_value'];
            }
            $_SESSION['total_current_value'] = $total_current_value;
            echo "<div class='result'>Total Current Value: $total_current_value</div>";
            
            // Calculate return on investment (ROI)
            $roi = ($total_current_value - $total_investment) / $total_investment * 100;
            echo "<div class='result'>Return on Investment (ROI): $roi%</div>";
        }
        ?>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expense Tracking System</title>
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

.remaining-budget {
    font-weight: bold;
    margin-top: 10px;
}
</style>
<script>
// JavaScript Validation
function validateExpenseAmount(input) {
    var regex = /^\d+(\.\d{1,2})?$/; // Allows positive numbers with up to two decimal places
    return regex.test(input.value);
}
</script>
</head>
<body>
<div class="container">
    <h2>Expense Tracking System</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="expense_description">Expense Description:</label>
        <input type="text" id="expense_description" name="expense_description" required><br>
        
        <label for="expense_amount">Expense Amount:</label>
        <input type="number" id="expense_amount" name="expense_amount" step="0.01" min="0.01" required oninput="validateExpenseAmount(this)"><br>
        
        <label for="expense_date">Expense Date:</label>
        <input type="date" id="expense_date" name="expense_date" required><br>
        
        <input type="submit" value="Add Expense">
    </form>
    
    <h2>Budget Calculation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="budget_amount">Budget Amount:</label>
        <input type="number" id="budget_amount" name="budget_amount" step="0.01" min="0.01" required><br>
        
        <input type="submit" value="Calculate Remaining Budget">
        
        <?php
        // PHP Integration
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process budget calculation
            $totalExpenses = 0;
            if (isset($_POST['expense_amount'])) {
                $expenseAmount = floatval($_POST['expense_amount']);
                $totalExpenses += $expenseAmount;
            }
            
            $budgetAmount = floatval($_POST['budget_amount']);
            $remainingBudget = $budgetAmount - $totalExpenses;
            
            echo "<div class='remaining-budget'>Remaining Budget: $remainingBudget</div>";
        }
        ?>
    </form>
</div>
</body>
</html>

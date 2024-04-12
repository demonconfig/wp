<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Budget Tracker</title>
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

.error {
    color: red;
}
</style>
<script>
// JavaScript Validation
function validateForm() {
    var monthlyIncome = document.getElementById("monthly_income").value.trim();
    var rentExpense = document.getElementById("rent_expense").value.trim();
    var groceriesExpense = document.getElementById("groceries_expense").value.trim();
    var transportationExpense = document.getElementById("transportation_expense").value.trim();
    var entertainmentExpense = document.getElementById("entertainment_expense").value.trim();
    var utilitiesExpense = document.getElementById("utilities_expense").value.trim();
    
    if (monthlyIncome === "" || rentExpense === "" || groceriesExpense === "" || transportationExpense === "" || entertainmentExpense === "" || utilitiesExpense === "") {
        alert("Please fill out all fields.");
        return false;
    }
    
    if (isNaN(monthlyIncome) || parseFloat(monthlyIncome) <= 0) {
        alert("Please enter a valid monthly income.");
        return false;
    }
    
    var expenseFields = [rentExpense, groceriesExpense, transportationExpense, entertainmentExpense, utilitiesExpense];
    for (var i = 0; i < expenseFields.length; i++) {
        if (isNaN(expenseFields[i]) || parseFloat(expenseFields[i]) < 0) {
            alert("Please enter valid numerical values for expense fields.");
            return false;
        }
    }
    
    return true;
}
</script>
</head>
<body>
<div class="container">
    <h2>Monthly Budget Tracker</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="monthly_income">Monthly Income:</label>
        <input type="number" id="monthly_income" name="monthly_income" min="0" required><br>
        
        <label for="rent_expense">Rent Expense:</label>
        <input type="number" id="rent_expense" name="rent_expense" min="0" required><br>
        
        <label for="groceries_expense">Groceries Expense:</label>
        <input type="number" id="groceries_expense" name="groceries_expense" min="0" required><br>
        
        <label for="transportation_expense">Transportation Expense:</label>
        <input type="number" id="transportation_expense" name="transportation_expense" min="0" required><br>
        
        <label for="entertainment_expense">Entertainment Expense:</label>
        <input type="number" id="entertainment_expense" name="entertainment_expense" min="0" required><br>
        
        <label for="utilities_expense">Utilities Expense:</label>
        <input type="number" id="utilities_expense" name="utilities_expense" min="0" required><br>
        
        <input type="submit" value="Save">
    </form>
</div>

<?php
// PHP Integration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monthlyIncome = $_POST['monthly_income'];
    $rentExpense = $_POST['rent_expense'];
    $groceriesExpense = $_POST['groceries_expense'];
    $transportationExpense = $_POST['transportation_expense'];
    $entertainmentExpense = $_POST['entertainment_expense'];
    $utilitiesExpense = $_POST['utilities_expense'];
    
    // Calculating total expenses
    $totalExpenses = $rentExpense + $groceriesExpense + $transportationExpense + $entertainmentExpense + $utilitiesExpense;
    
    // Calculating remaining budget
    $remainingBudget = $monthlyIncome - $totalExpenses;

    // Displaying budget details
    echo "<div class='container'>";
    echo "<h2>Budget Details</h2>";
    echo "<p>Monthly Income: $monthlyIncome</p>";
    echo "<p>Rent Expense: $rentExpense</p>";
    echo "<p>Groceries Expense: $groceriesExpense</p>";
    echo "<p>Transportation Expense: $transportationExpense</p>";
    echo "<p>Entertainment Expense: $entertainmentExpense</p>";
    echo "<p>Utilities Expense: $utilitiesExpense</p>";
    echo "<p>Total Expenses: $totalExpenses</p>";
    echo "<p>Remaining Budget: $remainingBudget</p>";
    echo "</div>";
}
?>

</body>
</html>

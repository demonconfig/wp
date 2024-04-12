<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GPA Calculator</title>
<style>
/* CSS Styling */
input[type=text] {
    width: 100px;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type=button] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button]:hover {
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
    var gradeFields = document.getElementsByClassName("grade-field");
    var isValid = true;
    
    for (var i = 0; i < gradeFields.length; i++) {
        var grade = gradeFields[i].value.toUpperCase();
        if (!/^[ABCDF]$/.test(grade)) {
            alert("Please enter a valid grade (A, B, C, D, F) for all courses.");
            isValid = false;
            break;
        }
    }
    
    if (isValid) {
        return true;
    } else {
        return false;
    }
}
</script>
</head>
<body>
<div class="container">
    <h2>GPA Calculator</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br>
        
        <label for="course1">Course 1 Grade:</label>
        <input type="text" id="course1" name="course1" class="grade-field" required><br>
        
        <label for="course2">Course 2 Grade:</label>
        <input type="text" id="course2" name="course2" class="grade-field" required><br>
        
        <label for="course3">Course 3 Grade:</label>
        <input type="text" id="course3" name="course3" class="grade-field" required><br>
        
        <label for="course4">Course 4 Grade:</label>
        <input type="text" id="course4" name="course4" class="grade-field" required><br>
        
        <label for="course5">Course 5 Grade:</label>
        <input type="text" id="course5" name="course5" class="grade-field" required><br>
        
        <input type="button" value="Calculate GPA" onclick="calculateGPA()">
    </form>
</div>

<script>
// Function to calculate GPA
function calculateGPA() {
    var gradeFields = document.getElementsByClassName("grade-field");
    var totalGradePoints = 0;
    var totalCreditHours = gradeFields.length;
    
    for (var i = 0; i < gradeFields.length; i++) {
        var grade = gradeFields[i].value.toUpperCase();
        switch (grade) {
            case 'A':
                totalGradePoints += 4;
                break;
            case 'B':
                totalGradePoints += 3;
                break;
            case 'C':
                totalGradePoints += 2;
                break;
            case 'D':
                totalGradePoints += 1;
                break;
            case 'F':
                totalCreditHours--; // Exclude failed courses from total credit hours
                break;
        }
    }
    
    var gpa = totalGradePoints / totalCreditHours;
    alert("Your GPA is: " + gpa.toFixed(2));
}
</script>

<?php
// PHP Integration - No need for PHP code as it's a client-side calculation
?>

</body>
</html>

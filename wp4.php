<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grade Calculator</title>
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
    var subjectScores = document.getElementsByClassName("subject-score");
    var isValid = true;
    
    for (var i = 0; i < subjectScores.length; i++) {
        var score = subjectScores[i].value;
        if (isNaN(score) || score < 0 || score > 100) {
            alert("Please enter a valid score between 0 and 100 for all subjects.");
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
    <h2>Grade Calculator</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br>
        
        <label for="subject1">Subject 1 Score:</label>
        <input type="text" id="subject1" name="subject1" class="subject-score" required><br>
        
        <label for="subject2">Subject 2 Score:</label>
        <input type="text" id="subject2" name="subject2" class="subject-score" required><br>
        
        <label for="subject3">Subject 3 Score:</label>
        <input type="text" id="subject3" name="subject3" class="subject-score" required><br>
        
        <label for="subject4">Subject 4 Score:</label>
        <input type="text" id="subject4" name="subject4" class="subject-score" required><br>
        
        <label for="subject5">Subject 5 Score:</label>
        <input type="text" id="subject5" name="subject5" class="subject-score" required><br>
        
        <input type="button" value="Calculate" onclick="calculateGrade()">
    </form>
</div>

<script>
// Function to calculate grade
function calculateGrade() {
    var subjectScores = document.getElementsByClassName("subject-score");
    var totalScore = 0;
    
    for (var i = 0; i < subjectScores.length; i++) {
        totalScore += parseInt(subjectScores[i].value);
    }
    
    var averageScore = totalScore / subjectScores.length;
    var grade = '';
    
    if (averageScore >= 90 && averageScore <= 100) {
        grade = 'A';
    } else if (averageScore >= 80 && averageScore < 90) {
        grade = 'B';
    } else if (averageScore >= 70 && averageScore < 80) {
        grade = 'C';
    } else if (averageScore >= 60 && averageScore < 70) {
        grade = 'D';
    } else {
        grade = 'F';
    }
    
    alert("Your final grade is: " + grade);
}
</script>

<?php
// PHP Integration - No need for PHP code as it's a client-side calculation
?>

</body>
</html>

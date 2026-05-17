<?php
include 'db.php';

/* Fetch students */
$students = $conn->query("SELECT * FROM Student");

/* Fetch courses */
$courses = $conn->query("SELECT * FROM Course");

/* Fetch semesters */
$semesters = $conn->query("SELECT * FROM Semester");

/* Insert registration */
if(isset($_POST['submit'])) {
    $student_id = $_POST['student'];
    $course_id = $_POST['course'];
    $semester_id = $_POST['semester'];
    $date = date("Y-m-d");

    /* CHECK if already registered */
    $check = "SELECT * FROM Registration 
              WHERE Student_ID='$student_id' 
              AND Course_ID='$course_id' 
              AND Semester_ID='$semester_id'";

    $result = $conn->query($check);

    if($result->num_rows > 0){
        echo "<p class='error'>Student already registered!</p>";
    } else {

        $sql = "INSERT INTO Registration 
                (Student_ID, Course_ID, Semester_ID, Registration_Date)
                VALUES ('$student_id', '$course_id', '$semester_id', '$date')";

        if($conn->query($sql) === TRUE){
            echo "<p class='success'>Registration Successful!</p>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Register Course</h1>
    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>
    <form method="POST">

        <!-- Student Dropdown -->
        <select name="student" required>
            <option value="">Select Student</option>
            <?php
            while($row = $students->fetch_assoc()){
                echo "<option value='{$row['Student_ID']}'>{$row['Name']}</option>";
            }
            ?>
        </select>

        <!-- Course Dropdown -->
        <select name="course" required>
            <option value="">Select Course</option>
            <?php
            while($row = $courses->fetch_assoc()){
                echo "<option value='{$row['Course_ID']}'>{$row['Course_Name']}</option>";
            }
            ?>
        </select>

        <!-- Semester Dropdown -->
        <select name="semester" required>
            <option value="">Select Semester</option>
            <?php
            while($row = $semesters->fetch_assoc()){
                echo "<option value='{$row['Semester_ID']}'>{$row['Semester_Name']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit">Register</button>
    </form>
    
</div>
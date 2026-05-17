<?php
include 'db.php';

/* Fetch departments */
$departments = $conn->query("SELECT * FROM Department");

/* Fetch instructors */
$instructors = $conn->query("SELECT * FROM Instructor");

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $credits = $_POST['credits'];
    $department = $_POST['department'];
    $instructor = $_POST['instructor'];

    $sql = "INSERT INTO Course (Course_Name, Credits, Department_ID, Instructor_ID)
            VALUES ('$name', '$credits', '$department', '$instructor')";

    if($conn->query($sql)){
        echo "<p class='success'>Course added successfully!</p>";
    } else {
        echo "<p class='error'>Error: {$conn->error}</p>";
    }
}
?>

<link rel="stylesheet" href="style.css">


<div class="main">
    <h1>Add Course</h1>

    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>

    <form method="POST">

        <label>Course Name</label>
        <input type="text" name="name" placeholder="Enter course name" required>

        <label>Credits</label>
        <input type="number" name="credits" placeholder="Enter credits" required>

        <label>Department</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <?php
            while($row = $departments->fetch_assoc()){
                echo "<option value='{$row['Department_ID']}'>{$row['Department_Name']}</option>";
            }
            ?>
        </select>

        <label>Instructor</label>
        <select name="instructor" required>
            <option value="">Select Instructor</option>
            <?php
            while($row = $instructors->fetch_assoc()){
                echo "<option value='{$row['Instructor_ID']}'>{$row['Name']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit">Add Course</button>
    </form>
</div>
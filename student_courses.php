<?php
include 'db.php';

/* Fetch students for dropdown */
$students = $conn->query("SELECT * FROM Student");

/* Initialize variables */
$result = null;
$total = 0;
$selected_name = "";

if(isset($_POST['submit'])) {
    $student_id = $_POST['student'];

    /* Get student name */
    $name_query = $conn->query("SELECT Name FROM Student WHERE Student_ID = '$student_id'");
    if($row = $name_query->fetch_assoc()){
        $selected_name = $row['Name'];
    }

    /* Fetch courses */
    $sql = "SELECT 
                C.Course_Name,
                C.Credits,
                Sem.Semester_Name,
                R.Registration_Date
            FROM Registration R
            JOIN Course C ON R.Course_ID = C.Course_ID
            JOIN Semester Sem ON R.Semester_ID = Sem.Semester_ID
            WHERE R.Student_ID = '$student_id'";

    $result = $conn->query($sql);
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>View Student Courses</h1>

   <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>

    <form method="POST">
        <select name="student" required>
            <option value="">Select Student</option>
            <?php
            while($row = $students->fetch_assoc()){
                echo "<option value='{$row['Student_ID']}'>{$row['Name']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="submit">View Courses</button>
    </form>

    <?php
    if($result){
        if($result->num_rows > 0){

            echo "<h3 style='text-align:center; margin-top:20px;'>$selected_name's Courses</h3>";

            echo "<table>
                    <tr>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Semester</th>
                        <th>Date</th>
                    </tr>";

            while($row = $result->fetch_assoc()){
                $total += $row['Credits'];

                echo "<tr>
                        <td>{$row['Course_Name']}</td>
                        <td>{$row['Credits']}</td>
                        <td>{$row['Semester_Name']}</td>
                        <td>{$row['Registration_Date']}</td>
                      </tr>";
            }

            echo "</table>";

            echo "<h3 style='text-align:center; margin-top:15px;'>
                    Total Credits: $total
                  </h3>";

        } else {
            echo "<p class='error'>No courses registered for this student.</p>";
        }
    }
    ?>
    
</div>


<?php
include 'db.php';

/* Fetch course data with department + instructor */
$sql = "SELECT 
            C.Course_ID,
            C.Course_Name,
            C.Credits,
            D.Department_Name,
            I.Name AS Instructor_Name
        FROM Course C
        JOIN Department D ON C.Department_ID = D.Department_ID
        LEFT JOIN Instructor I ON C.Instructor_ID = I.Instructor_ID";

$result = $conn->query($sql);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Courses</h1>

    <div class="nav">
        <a href="index.php">🏠 Home</a>
        <a href="add_course.php">Add Course</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Credits</th>
            <th>Department</th>
            <th>Instructor</th>
            <th>Action</th>
        </tr>

        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['Course_ID']}</td>
                        <td>{$row['Course_Name']}</td>
                        <td>{$row['Credits']}</td>
                        <td>{$row['Department_Name']}</td>
                        <td>{$row['Instructor_Name']}</td>
                        <td>
                            <a href='delete_course.php?id={$row['Course_ID']}'
                            onclick=\"return confirm('Delete this course?')\">
                            Delete
                            </a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No courses found</td></tr>";
        }
        ?>
    </table>
</div>
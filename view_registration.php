<?php
include 'db.php';

$sql = "SELECT 
            R.Registration_ID,
            S.Name AS Student_Name,
            C.Course_Name,
            Sem.Semester_Name,
            R.Registration_Date
        FROM Registration R
        JOIN Student S ON R.Student_ID = S.Student_ID
        JOIN Course C ON R.Course_ID = C.Course_ID
        JOIN Semester Sem ON R.Semester_ID = Sem.Semester_ID";

$result = $conn->query($sql);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Course Registrations</h1>
    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Registration Date</th>
            <th>Action</th>
        </tr>

        <?php
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['Student_Name']}</td>
                    <td>{$row['Course_Name']}</td>
                    <td>{$row['Semester_Name']}</td>
                    <td>{$row['Registration_Date']}</td>
                    <td>
                        <a href='delete_registration.php?id={$row['Registration_ID']}'
                        onclick=\"return confirm('Delete this registration?')\">
                        Delete
                        </a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

    
</div>
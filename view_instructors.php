<?php
include 'db.php';

/* Fetch instructors with department names */
$sql = "SELECT 
            I.Instructor_ID,
            I.Name,
            I.Email,
            D.Department_Name
        FROM Instructor I
        JOIN Department D ON I.Department_ID = D.Department_ID";

$result = $conn->query($sql);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Instructors</h1>

    <div class="nav">
        <a href="index.php">🏠 Home</a>
        <a href="add_instructor.php">Add Instructor</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['Instructor_ID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Department_Name']}</td>
                        <td>
                            <a href='delete_instructor.php?id={$row['Instructor_ID']}'
                            onclick=\"return confirm('Delete this instructor?')\">
                            Delete
                            </a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No instructors found</td></tr>";
        }
        ?>
    </table>
</div>
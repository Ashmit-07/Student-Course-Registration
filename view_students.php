<?php
include 'db.php';

$result = $conn->query("SELECT * FROM Student");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Students</h1>

    <div class="nav">
        <a href="index.php">Home</a>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['Name']}</td>
                    <td>{$row['Email']}</td>
                    <td>
                        <a href='delete_student.php?id={$row['Student_ID']}'
                        onclick=\"return confirm('Delete this student?')\">
                        Delete
                        </a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>
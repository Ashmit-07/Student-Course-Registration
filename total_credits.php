<?php
include 'db.php';

$sql = "SELECT S.Name, SUM(C.Credits) AS Total_Credits
        FROM Registration R
        JOIN Student S ON R.Student_ID = S.Student_ID
        JOIN Course C ON R.Course_ID = C.Course_ID
        GROUP BY S.Student_ID";

$result = $conn->query($sql);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Total Credits per Student</h1>
    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Total Credits</th>
        </tr>

        <?php
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['Name']}</td>
                    <td>{$row['Total_Credits']}</td>
                  </tr>";
        }
        ?>
    </table>
    
</div>
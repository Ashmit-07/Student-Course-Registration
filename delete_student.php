<?php
include 'db.php';

$id = $_GET['id'];

/* Step 1: delete registrations */
$conn->query("DELETE FROM Registration WHERE Student_ID = $id");

/* Step 2: delete student */
$sql = "DELETE FROM Student WHERE Student_ID = $id";

if($conn->query($sql)){
    header("Location: view_students.php");
} else {
    echo "Error deleting student: " . $conn->error;
}
?>
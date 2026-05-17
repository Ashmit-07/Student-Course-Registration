<?php
include 'db.php';

$id = $_GET['id'];


$conn->query("UPDATE Course SET Instructor_ID = NULL WHERE Instructor_ID = $id");


$sql = "DELETE FROM Instructor WHERE Instructor_ID = $id";

if($conn->query($sql)){
    header("Location: view_instructors.php");
} else {
    echo "Error deleting instructor: " . $conn->error;
}
?>
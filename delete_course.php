<?php
include 'db.php';

$id = $_GET['id'];

/* Step 1: Delete registrations using this course */
$conn->query("DELETE FROM Registration WHERE Course_ID = $id");

/* Step 2: Delete course */
$sql = "DELETE FROM Course WHERE Course_ID = $id";

if($conn->query($sql)){
    header("Location: view_courses.php");
} else {
    echo "Error deleting course: " . $conn->error;
}
?>
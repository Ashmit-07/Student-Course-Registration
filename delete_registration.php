<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM Registration WHERE Registration_ID = $id";

if($conn->query($sql)){
    header("Location: view_registration.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
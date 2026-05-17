<?php
include 'db.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO Instructor (Name, Email, Department_ID)
            VALUES ('$name', '$email', '$department')";

    if($conn->query($sql) === TRUE){
        echo "<p class='success'>Instructor Added!</p>";
    } else {
        echo "<p class='error'>Error: {$conn->error}</p>";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Add Instructor</h1>
    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>
    

    <form method="POST">
        <input type="text" name="name" placeholder="Instructor Name" required>
        <input type="email" name="email" placeholder="Email" required>

        <select name="department" required>
            <option value="">Select Department</option>
            <option value="1">CSE</option>
            <option value="2">ECE</option>
        </select>

        <button type="submit" name="submit">Add Instructor</button>
    </form>
</div>
<?php
include 'db.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department_id = $_POST['department'];

    $sql = "INSERT INTO Student (Name, Address, Phone, Email, Department_ID)
            VALUES ('$name', '$address', '$phone', '$email', '$department_id')";

    if($conn->query($sql) === TRUE){
        echo "Student Added Successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Add Student</h1>
    <div class="nav">
        <a href="index.php">🏠 Home</a>
    </div>

    <form method="POST">
        <label>Student Name</label>
<input type="text" name="name" placeholder="Enter full name" required>

<label>Address</label>
<input type="text" name="address" placeholder="City / Location">

<label>Phone</label>
<input type="text" name="phone" placeholder="10-digit number">

<label>Email</label>
<input type="email" name="email" placeholder="example@email.com">

<label>Department</label>
<select name="department">
    <option value="">Select Department</option>
    <option value="1">CSE</option>
    <option value="2">ECE</option>
</select>

        <button type="submit" name="submit">Add Student</button>
    </form>
    

</div>
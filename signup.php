<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $cnum = $_POST['number'];
    $address = $_POST['add'];
    $gmail = $_POST['mail'];
    $password = $_POST['pass'];

    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
        $query="insert into form(fname,lname,gender,cnum,address,email,pass) values('$firstname','$lastname',' $Gender','$cnum','$address ','$gmail','$password')";
        mysqli_query($con,$query);
        echo"<script type=' text/javascript'> alert ('Successfully Registered')</script>";
    }
    else
    {
        echo"<script type=' text/javascript'> alert ('Please enter some valid information!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login and Register </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <h4> It's free and only takes a minute</h4>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>Contact Address</label>
            <input type="tel" name="number" required>
            <label> Address</label>
            <input type="text" name="add" required>
            <label>Email Id</label>
            <input type="email" name="mail" required>
            <label> Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>By clicking the Sign Up button, you agree to our <br>
            <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
        </p>

        <p> Already have an Account? <a href="login.php">Login Here</a></p>
</body>

</html>
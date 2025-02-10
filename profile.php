<?php
session_start();
include("db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$gender = $_SESSION['gender'];
$cnum = $_SESSION['cnum'];
$address = $_SESSION['address'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .profile-box {
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 50px auto;
        }
        .profile-box h2 { margin-bottom: 10px; }
        .profile-box p { margin: 5px 0; }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>

    <div class="profile-box">
        <h2><?php echo $fname . " " . $lname; ?></h2>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        <p><strong>Contact:</strong> <?php echo $cnum; ?></p>
        <p><strong>Address:</strong> <?php echo $address; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <a href="index.php" class="back-btn">Back</a>
    </div>

</body>
</html>


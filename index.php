<?php
session_start();
include("db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .profile-btn { background-color: #4CAF50; }
        .logout-btn { background-color: #f44336; }
        .btn:hover { opacity: 0.8; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['fname']; ?>!</h1>
        <a href="profile.php" class="btn profile-btn">Profile</a>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>

</body>
</html>

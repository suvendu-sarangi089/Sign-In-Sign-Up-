<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = mysqli_real_escape_string($con, $_POST['mail']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    if (!empty($gmail) && !empty($password) && !is_numeric($gmail)) {
        $query = "SELECT * FROM forml WHERE email='$gmail' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Check password (consider using password hashing in future)
            if ($user_data['pass'] === $password) {
                // Store user details in session
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['fname'] = $user_data['fname'];
                $_SESSION['lname'] = $user_data['lname'];
                $_SESSION['gender'] = $user_data['gender'];
                $_SESSION['cnum'] = $user_data['cnum'];
                $_SESSION['address'] = $user_data['address'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['pass'] = $user_data['pass'];
                header("Location: index.php");
                exit();
            }
        }
        echo "<script>alert('Wrong username or password');</script>";
    } else {
        echo "<script>alert('Please enter valid credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label>Email Id</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" value="Login">
        </form>
        <p>Not a member? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>


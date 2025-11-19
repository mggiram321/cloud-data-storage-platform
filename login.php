<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: home.php");
        exit();

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body { font-family: Arial; text-align:center; padding-top:50px; background:#e8f1ff; }
form { background:white; padding:20px; width:300px; margin:auto; border-radius:10px; box-shadow:0 0 10px #0002; }
input { width:90%; padding:10px; margin:8px; }
button { padding:10px; width:95%; background:#005eff; color:white; border:none; border-radius:5px; cursor:pointer; }
</style>
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Enter Email" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button>Login</button>
</form>
<p>No account? <a href="register.php">Register</a></p>
</body>
</html>

<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' OR username='$username'");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Username or Email already exists!');</script>";
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
        mysqli_query($conn, $query);
        echo "<script>alert('Registration Successful! Please Login'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body { font-family: Arial; text-align:center; padding-top:50px; background:#e8f1ff; }
form { background:white; padding:20px; width:300px; margin:auto; border-radius:10px; box-shadow:0 0 10px #0002; }
input { width:90%; padding:10px; margin:8px; }
button { padding:10px; width:95%; background:#005eff; color:white; border:none; border-radius:5px; cursor:pointer; }
</style>
</head>
<body>
<h2>Create Account</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button>Register</button>
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>

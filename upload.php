<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $folder = "uploads/user_" . $user_id . "/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $file = $_FILES['file']['name'];
    $path = $folder . $file;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        mysqli_query($conn, "INSERT INTO files (user_id, filename, filepath) VALUES ('$user_id','$file','$path')");
        $message = "File Uploaded Successfully!";
    } else {
        $message = "Upload Failed!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload Files</title>
<style>
body {
    font-family: Arial;
    text-align: center;
    padding-top: 50px;
    background: #eef4ff;
}
form {
    background: white;
    padding: 20px;
    width: 300px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 0 0 10px #0002;
}
button, .btn {
    padding: 10px;
    background: #005eff;
    color: white;
    border: none;
    border-radius: 5px;
    width: 20%;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-top: 15px;
}
.back {
    background: #444;
}
</style>
</head>
<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

<p style="color:green; font-weight:bold;"><?php echo $message; ?></p>

<!-- ⭐ My Files Button -->
<a href="stored.php" class="btn">📁 My Files</a>

<!-- Optional: Back to Home -->
<a href="home.php" class="btn back">🏠 Back to Home</a>

</body>
</html>

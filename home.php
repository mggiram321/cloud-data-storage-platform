<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<style>
body { font-family: Arial; text-align:center; padding-top:40px; background:#f0f6ff; }
a { padding:12px 20px; background:#005eff; color:white; border-radius:5px; text-decoration:none; margin:10px; display:inline-block; }
.logout { background:red; }
</style>
</head>
<body>

<h2>Welcome, <?php echo $_SESSION['username']; ?> 👋</h2>

<a href="upload.php">Upload Files</a>
<a href="stored.php">My Files</a>
<a href="logout.php" class="logout">Logout</a>

</body>
</html>

<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$files = mysqli_query($conn, "SELECT * FROM files WHERE user_id='$user_id'");
?>
<!DOCTYPE html>
<html>
<head>
<title>My Files</title>
<style>
body { font-family: Arial; text-align:center; padding-top:30px; background:#f0f6ff; }
.box { width:200px; display:inline-block; margin:10px; background:white; padding:10px; border-radius:8px; box-shadow:0 2px 5px #0002; }
img { width:100%; height:120px; object-fit:cover; border-radius:5px; }
.btn {
    padding:7px 10px;
    margin-top:8px;
    background:#005eff;
    color:white;
    border-radius:5px;
    text-decoration:none;
    display:block;
}
.delete {
    background:red;
}
</style>
</head>
<body>

<h2>Your Stored Files</h2>

<?php
while ($row = mysqli_fetch_assoc($files)) {

    $file = $row['filepath'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $id = $row['id'];

    echo "<div class='box'>";

    if (in_array($ext, ['jpg','jpeg','png','gif'])) {
        echo "<img src='$file'>";
    } else {
        echo "<p>📄 " . $row['filename'] . "</p>";
    }

    echo "<a href='$file' download class='btn'>Download</a>";

    // ⭐ Delete button added
    echo "<a href='delete.php?id=$id' class='btn delete' onclick=\"return confirm('Delete this file?');\">Delete</a>";

    echo "</div>";
}
?>

</body>
</html>

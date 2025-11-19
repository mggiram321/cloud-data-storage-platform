<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {

    $file_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Fetch file info
    $query = mysqli_query($conn, "SELECT * FROM files WHERE id='$file_id' AND user_id='$user_id'");
    $file = mysqli_fetch_assoc($query);

    if ($file) {
        $filepath = $file['filepath'];

        // Delete from folder
        if (file_exists($filepath)) {
            unlink($filepath);
        }

        // Delete from database
        mysqli_query($conn, "DELETE FROM files WHERE id='$file_id'");

        echo "<script>alert('File deleted successfully'); window.location='stored.php';</script>";
    } else {
        echo "<script>alert('Invalid file or permission denied'); window.location='stored.php';</script>";
    }
}
?>

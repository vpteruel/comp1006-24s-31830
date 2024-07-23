<?php
require 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM projects WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // echo "<script>alert('Record deleted successfully.'); window.location.href='view_projects.php';</script>";
        echo "<script>window.location.href='view_projects.php';</script>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}

<?php
include 'src/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete user from the database
    $sql = "DELETE FROM Subscribers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to home page or any other page
        header("Location: index.html");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

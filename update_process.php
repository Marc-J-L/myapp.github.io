<?php
include 'src/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subscriptions = isset($_POST['subscriptions']) ? $_POST['subscriptions'] : array(); 

    // Convert subscriptions array to string
    $subscriptionsString = implode(', ', $subscriptions);

    // Update user information in the database
    $sql = "UPDATE Subscribers SET name='$name', email='$email', subscriptions='$subscriptionsString' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to user account page
        header("Location: account.php?username=$name");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<?php

function insertSubscriber($name, $email, $subscriptions) {
    include 'db.php';

    $subscriptionsString = implode(', ', $subscriptions);

    $sql = "INSERT INTO Subscribers (name, email, subscriptions) VALUES ('$name', '$email', '$subscriptionsString')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function usernameExists($name) {
    include 'db.php';

    $sql = "SELECT * FROM Subscribers WHERE name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; // Username exists
    } else {
        return false; // Username does not exist
    }

    $conn->close();
}

?>
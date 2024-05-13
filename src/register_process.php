<?php
include 'functions.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subscriptions = $_POST['subscriptions'];

// Check if username already exists
if (usernameExists($name)) {
    echo "<script>alert('Username already exists. Please choose a different username. '); window.location.href = '../register.php';</script>";
    exit();
}

if (insertSubscriber($name, $email, $subscriptions)) {
    header("Location:../account.php?username=$name");
} else {
    echo "Error: Unable to register. Please try again.";
}
?>

<?php
include "src/db.php";

// Get user ID from URL parameter
$id = $_GET['id'];

// Retrieve user information from the database
$sql = "SELECT * FROM Subscribers WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $subscriptions = explode(', ', $row['subscriptions']);
} else {
    echo "User not found";
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Update Information</title>
</head>
<body class="h-screen bg-cover bg-center" style="background-image: url(images/106.jpg)">
    <div class="mt-20 max-w-xs w-full m-auto bg-white bg-opacity-80 rounded-xl p-12 ">
        <h2 class="text-sky-800 text-xl font-bold text-center ">Update Information</h2>
        <br>
        <form action="update_process.php" method="post" class="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" class="w-full px-2 py-1 border-2 rounded-xl transition duration-300 border-gray-100 focus:border-green-800 focus:outline-none focus-effect" value="<?php echo $name; ?>" required class="rounded-md"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" class="w-full px-2 py-1 border-2 rounded-xl transition duration-300 border-gray-100 focus:border-green-800 focus:outline-none focus-effect" value="<?php echo $email; ?>" required class="rounded-md"><br>
            <br>
            <label>Subscription:</label><br>
            <input type="checkbox" name="subscriptions[]" value="Programming" <?php if (in_array('Programming', $subscriptions)) echo "checked"; ?>> Programming<br>
            <input type="checkbox" name="subscriptions[]" value="Travel" <?php if (in_array('Travel', $subscriptions)) echo "checked"; ?>> Travel<br>
            <input type="checkbox" name="subscriptions[]" value="Food" <?php if (in_array('Food', $subscriptions)) echo "checked"; ?>> Food<br>
            <input type="checkbox" name="subscriptions[]" value="Music" <?php if (in_array('Music', $subscriptions)) echo "checked"; ?>> Music<br>
            <input type="checkbox" name="subscriptions[]" value="Gaming" <?php if (in_array('Gaming', $subscriptions)) echo "checked"; ?>> Gaming<br>
            <br><br>
            <div class="text-center">
                <input type="submit" value="Submit" class="animate-bounce w-2/3 mx-auto text-center bg-blue-700 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full">
            </div>
            
        </form>
    </div>
    
</body>
</html>

<?php
$conn->close();
?>

<?php

include 'src/db.php';
include 'vendor/autoload.php';

use Carbon\Carbon;

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Retrieve user information from database
    $sql = "SELECT * FROM Subscribers WHERE name='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $subscriptions = $row['subscriptions'];

        // Get current date and time according to user's timezone
        $timezone = 'EDT'; 
        $date = Carbon::now($timezone);

        // Display user account information
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
            <title>User Account</title>
        </head>
        <body class="h-screen bg-cover bg-center" style="background-image: url(images/102.jpg)">
            <div  >

                <div class="mt-20 max-w-xs w-full m-auto bg-white bg-opacity-70 rounded-xl p-12 ">
                    <h2 class="text-sky-800 text-2xl font-bold text-center border-spacing-x-10">User Account</h2>
                    <br>
                    <p>Name: <span class="font-bold"><?php echo $name; ?></span></p>
                    <p>Email: <span class="font-bold"><?php echo $email; ?></span></p>
                    <p>Subscriptions: <span class="font-bold flex"><?php echo $subscriptions; ?></span></p>
                    <br>
                    <p>Date/Time: <span class="font-bold flex justify-center"><?php echo $date->toDateString(); ?></span>
                    <span id="clock" class="font-bold flex justify-center"></span></p>
                    
                    
                    <br>
                    
                    <!-- Update Information Button -->
                    <form id="updateForm" action="update.php?id=<?php echo $id; ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update Information" class="w-full bg-blue-600 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded-full">
                    </form>
                    
                    <!-- Delete Account Button -->
                    <form action="delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Delete Account" class="w-full bg-purple-600 hover:bg-yellow-300 text-white font-bold py-2 px-4 mb-6 rounded-full">
                    </form>
                    <br>
                    <a href="index.html" class="animate-bounce flex justify-center w-full bg-blue-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded-full">Return</a>
                </div>
            </div>
            
            
        </body>
        <script>
            function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            
            // two number format
            hours = ('0' + hours).slice(-2);
            minutes = ('0' + minutes).slice(-2);
            seconds = ('0' + seconds).slice(-2);
            
            // string of the colock
            var timeString = hours + ':' + minutes + ':' + seconds;
            
            
            document.getElementById('clock').textContent = timeString;
            }

            // one second one update
            setInterval(updateClock, 1000);

            // uplode page for clock
            updateClock();

        </script>
        </html>
        <?php
    } else {
        echo "<script>alert('The username does not exist. Please enter again. '); window.location.href = 'index.html';</script>";
    }
}
?>


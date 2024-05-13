

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="h-screen bg-cover bg-center" style="background-image: url(../images/108.jpg)">
<div class="items-center justify-center mt-20  max-w-xs w-full m-auto bg-indigo-100 bg-opacity-70 rounded-xl p-7 text-left">
    <?php
        include 'db.php';

        $sql = "SELECT * FROM Subscribers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<span class='flex justify-center font-bold text-2xl' >Subscribers List</span><br>";
            while ($row = $result->fetch_assoc()) {
                
                echo "Name: <span class='font-bold'>" . $row['name'] . "</span><br> - Email: " . $row['email'] . "<br> - Subscriptions: " . $row['subscriptions'] . "<br><br>";

            }
            
        } else {
            echo "0 results";
        }
        echo '<br><a  class="animate-bounce flex justify-center bg-blue-800 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-full" href="../index.html">Return</a>';

        $conn->close();
    ?>
</div>
    
</body>
</html>
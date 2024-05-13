<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">

    <title>Register and Subscribe</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="flex h-screen bg-indigo-400 ">
    <div class="container max-w-xs w-full m-auto bg-indigo-100 rounded-xl p-7 text-center shadow-2xl">
        <h2 class="text-sky-800 text-2xl font-bold">Register and Subscribe</h2>
        <br>
        <form action="src/register_process.php" method="post" class="text-left">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required class="w-full px-2 py-1 border-2 rounded-xl transition duration-300 border-gray-100 focus:border-indigo-800 focus:outline-none focus-effect"><br>
            <br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required class="w-full px-2 py-1 border-2 rounded-xl transition duration-300 border-gray-100 focus:border-indigo-800 focus:outline-none focus-effect"><br>
            <br>
            <label >Subscription:</label><br>
            <input type="checkbox" class="form-checkbox h-4 w-8 " name="subscriptions[]" value="Programming"> Programming<br>
            <input type="checkbox" class="form-checkbox h-4 w-8 " name="subscriptions[]" value="Travel"> Travel<br>
            <input type="checkbox" class="form-checkbox h-4 w-8 " name="subscriptions[]" value="Food"> Food<br>
            <input type="checkbox" class="form-checkbox h-4 w-8 " name="subscriptions[]" value="Music"> Music<br>
            <input type="checkbox" class="form-checkbox h-4 w-8 " name="subscriptions[]" value="Gaming"> Gaming<br>
            <br>
            <input type="submit" value="Register" class="animate-pulse w-full bg-indigo-800 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded-full">
        </form>
    </div>
    
</body>
</html>


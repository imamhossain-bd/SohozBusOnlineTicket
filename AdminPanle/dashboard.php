<?php
session_start();

@include('./Includes/db.php'); 
@include('./Includes/auth_session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-blue-800 text-white flex flex-col">
            
        </aside>

        <main class="flex-1 p-6">

        </main>
    </div>
</body>
</html>
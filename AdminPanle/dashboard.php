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
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white flex flex-col">
            <div class="p-4 text-lg font-semibold">Admin Panel</div>
            <nav class="px-4 space-y-2">
                <a href="manage_buses.php" class="block px-4 py-2 hover:bg-blue-700 rounded">Manage Buses</a>
                <a href="manage_routes.php" class="block px-4 py-2 hover:bg-blue-700 rounded">Manage Routes</a>
                <a href="manage_bookings.php" class="block px-4 py-2 hover:bg-blue-700 rounded">Manage Bookings</a>
                <a href="../logout.php" class="block px-4 py-2 hover:bg-blue-700 rounded">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Buses</h2>
                    <p class="text-3xl font-bold">25</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Routes</h2>
                    <p class="text-3xl font-bold">10</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Bookings</h2>
                    <p class="text-3xl font-bold">120</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-3xl font-bold">75</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
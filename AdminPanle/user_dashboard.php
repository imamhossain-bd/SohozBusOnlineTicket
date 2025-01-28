<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-lg font-bold">User Dashboard</h2>
            </div>
            <nav>
                <ul>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="user_dashboard.php?pages=user_profile" class="flex items-center">
                            <span class="material-icons mr-2">person</span>
                            Profile Update
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="#" class="flex items-center">
                            <span class="material-icons mr-2">confirmation_number</span>
                            Total Tickets
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="#" class="flex items-center">
                            <span class="material-icons mr-2">payment</span>
                            Payment History
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="../login.php" class="flex items-center">
                            <span class="material-icons mr-2">logout</span>
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-full w-10 h-10">
                    <button class="bg-gray-100 p-2 rounded-full hover:bg-gray-200">
                        <span class="material-icons">settings</span>
                    </button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="flex-grow p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Example Cards -->
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-lg font-bold">Total Tickets</h2>
                        <p class="text-gray-500">42</p>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-lg font-bold">Payment History</h2>
                        <p class="text-gray-500">$1,250</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/icon?family=Material+Icons');
    </style>
</body>
</html>
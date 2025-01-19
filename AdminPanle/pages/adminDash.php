<?php
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>

    <section>
        <div class="px-8 grid grid-cols-4 gap-5 py-6 ">
            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Bookings</h2>
                    </div>
                    <div class="text-green-500 text-2xl">
                        <i class="fa-solid fa-ticket"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Bookings</p>
                <?php
                    $getBooking = $conn->query("SELECT * FROM bookings");
                    echo "<p class='text-gray-900 text-3xl font-bold mt-1'>" . $getBooking->num_rows . "</p>";
                ?>
                <a class="flex justify-end items-center gap-1 text-green-500 text-sm font-medium mt-2 hover:underline" href="dashboard.php?pages=booking">View More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Buses</h2>
                    </div>
                    <div class="text-red-500 text-2xl">
                        <i class="fa-solid fa-bus"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Buses</p>
                <?php
                $getBuses = $conn->query("SELECT * FROM buses");
                echo "<p class='text-gray-900 text-3xl font-bold mt-1'>" . $getBuses->num_rows .  "</p>";
                ?>
                
                <a class="flex justify-end items-center gap-1 text-red-500 text-sm font-medium mt-2 hover:underline" href="dashboard.php?pages=buses">View More <i class="fas fa-arrow-right"></i></a>
            </div>
            
            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Routes</h2>
                    </div>
                    <div class="text-orange-500 text-2xl">
                        <i class="fa-solid fa-road"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Routes</p>
                <?php
                    $getRoute = $conn->query("SELECT * FROM routes");
                    echo "<p class='text-gray-900 text-3xl font-bold mt-1'>" . $getRoute->num_rows . "</p>";
                ?>
                <a class="flex justify-end items-center gap-1 text-orange-500 text-sm font-medium mt-2 hover:underline" href="dashboard.php?pages=routes">View More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Seats</h2>
                    </div>
                    <div class="text-purple-500 text-2xl">
                        <i class="fa-solid fa-th"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Seats</p>
                <?php
                    $getSeats = $conn->query("SELECT * FROM seats");
                    echo "<p class='text-gray-900 text-3xl font-bold mt-1'>" . $getSeats->num_rows . "</p>";
                ?>
                <a class="flex justify-end items-center gap-1 text-purple-500 text-sm font-medium mt-2 hover:underline" href="dashboard.php?pages=seates">View More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Customers</h2>
                    </div>
                    <div class="text-teal-500 text-2xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Customers</p>
                <p class="text-gray-900 text-3xl font-bold mt-1">999</p>
                <a class="flex justify-end items-center gap-1 text-teal-500 text-sm font-medium mt-2 hover:underline" href="#">View More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Users</h2>
                    </div>
                    <div class="text-indigo-500 text-2xl">
                        <i class="fa-solid fa-user-lock"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Users</p>
                <?php
                    $getUsers = $conn->query("SELECT * FROM users");
                    echo "<p class='text-gray-900 text-3xl font-bold mt-1'>" . $getUsers->num_rows . "</p>";
                ?>
                <a class="flex justify-end items-center gap-1 text-indigo-500 text-sm font-medium mt-2 hover:underline" href="dashboard.php?pages=user">View More <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="relative w-[260px] px-5 py-6 h-auto overflow-hidden bg-white rounded-xl shadow-lg transition-transform duration-300 group hover:scale-105 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3">
                    <div class="py-2 px-4 w-32 text-center bg-gray-100 rounded-lg">
                        <h2 class="text-gray-800 font-semibold text-lg tracking-wide">Earnings</h2>
                    </div>
                    <div class="text-green-600 text-2xl">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                </div>
                <p class="text-gray-600 text-sm font-medium">Total Earnings</p>
                <p class="text-gray-900 text-3xl font-bold mt-1">999</p>
                <a class="flex justify-end items-center gap-1 text-green-600 text-sm font-medium mt-2 hover:underline" href="#">View More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
</body>
</html>

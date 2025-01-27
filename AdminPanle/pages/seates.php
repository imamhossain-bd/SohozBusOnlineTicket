<?php
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$bus_no = 'NBS4455';
if (isset($_GET['submit'])) {  // Only run when the form is submitted

    mysqli_query($conn, "INSERT INTO buses (bus_no) VALUES ('$bus_no')");
    $bus_id = mysqli_insert_id($conn); // Get the inserted bus_id

    // Insert seats for the bus
    $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    $seats_per_row = 4;
    foreach ($rows as $row) {
        for ($i = 1; $i <= $seats_per_row; $i++) {
            $seat_code = $row . $i;
            mysqli_query($conn, "INSERT INTO seats (bus_id, seat_code) VALUES ($bus_id, '$seat_code')");
        }
    }
}
if (isset($_GET['submit'])) {
    $bus_no = $_GET['bus_no'];
    $query = "SELECT seats.seat_code, seats.status FROM seats
              JOIN buses ON seats.bus_id = buses.bus_id
              WHERE buses.bus_no = '$bus_no'";
    $result = mysqli_query($conn, $query);
    $seatStatus = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $seatStatus[$row['seat_code']] = $row['status'];
    }
} 


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Seats</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <style>
        .seat:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        .seat:active {
            transform: translateY(0);
        }

        .seat.booked {
            background-color: #d1d5db; /* Gray color for booked seat */
            cursor: not-allowed;
        }

        .seat.available {
            background-color: #10b981; /* Green color for available seat */
        }
        .cursor-not-allowed {
            pointer-events: none; /* Disable all clicks */
            opacity: 0.6; /* Reduce visibility */
        }
    </style>
</head>
<body>
    <section>
        <div class="w-full max-w-sm mx-auto p-4 bg-[#f0f0f0] rounded-lg shadow-xl mt-7">
            <h2 class="text-xl text-center font-semibold text-gray-800 mb-4">Seat Status</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <div class="flex items-center">
                    <input type="text" name="bus_no" placeholder="Bus Number" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <button name="submit" class="px-6 py-2 bg-black text-white font-medium rounded-r-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                </div>
            </form>
        </div>

        
        <div id="Bus_Number" class="w-full ml-[200px] mt-24 max-w-4xl p-6 bg-[#e9e8e8] rounded-lg shadow-xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Bus Seat Reservation</h1>
            <p class="text-gray-600 mb-6 font-bold text-center">
                <?php echo isset($bus_no) ? "Bus NO: $bus_no" : "Bus Number"; ?>
            </p>

            <div class="grid grid-cols-5 gap-4">
            <!-- Driver -->
                <div class="col-span-5 flex justify-end mb-4">
                    <div class="bg-gray-800 text-white cursor-pointer mr-5 px-4 py-2 rounded-md">Driver</div>
                </div>
                <?php
                $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
                $seats_per_row = 4;
                foreach ($rows as $row) {
                    $seat_left_1 = $row . '1';
                    $seat_left_2 = $row . '2';
                    $seat_right_1 = $row . '3';
                    $seat_right_2 = $row . '4';

                    $status_left_1 = $seatStatus[$seat_left_1] ?? 'available';
                    $status_left_2 = $seatStatus[$seat_left_2] ?? 'available';
                    $status_right_1 = $seatStatus[$seat_right_1] ?? 'available';
                    $status_right_2 = $seatStatus[$seat_right_2] ?? 'available';

                    $class_left_1 = ($status_left_1 === 'booked') ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 cursor-pointer';
                    $class_left_2 = ($status_left_2 === 'booked') ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 cursor-pointer';
                    $class_right_1 = ($status_right_1 === 'booked') ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 cursor-pointer';
                    $class_right_2 = ($status_right_2 === 'booked') ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 cursor-pointer';

                    $disabled_left_1 = ($status_left_1 === 'booked') ? 'disabled' : '';
                    $disabled_left_2 = ($status_left_2 === 'booked') ? 'disabled' : '';
                    $disabled_right_1 = ($status_right_1 === 'booked') ? 'disabled' : '';
                    $disabled_right_2 = ($status_right_2 === 'booked') ? 'disabled' : '';

                    echo "<div class='col-span-2 flex justify-around'>
                            <button class='seat text-white w-16 h-12 rounded-md flex items-center justify-center $class_left_1' $disabled_left_1>$seat_left_1</button>
                            <button class='seat text-white w-16 h-12 rounded-md flex items-center justify-center $class_left_2' $disabled_left_2>$seat_left_2</button>
                        </div>";
                    echo "<div class='col-span-1'></div>"; // Empty space
                    echo "<div class='col-span-2 flex justify-around'>
                            <button class='seat text-white w-16 h-12 rounded-md flex items-center justify-center $class_right_1' $disabled_right_1>$seat_right_1</button>
                            <button class='seat text-white w-16 h-12 rounded-md flex items-center justify-center $class_right_2' $disabled_right_2>$seat_right_2</button>
                        </div>";
                }
                ?>
            </div>
        </div>

    </section>

    <script>
        

    </script>


</body>
</html>

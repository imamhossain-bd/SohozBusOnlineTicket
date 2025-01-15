<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Only add seats if explicitly requested through a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSeats'])) {
    $bus_ids = [20, 23, 24, 25]; // Example bus IDs

    foreach ($bus_ids as $bus_id) {
        // Check if the bus exists in the buses table
        $check_bus_query = "SELECT * FROM buses WHERE id = $bus_id";
        $result = mysqli_query($conn, $check_bus_query);

        // If the bus doesn't exist, insert a new bus record
        if (mysqli_num_rows($result) == 0) {
            $insert_bus_query = "INSERT INTO buses (id, bus_no) VALUES ($bus_id, 'Bus_$bus_id')";
            mysqli_query($conn, $insert_bus_query);
        }

        // Check if seats already exist for the bus
        $check_seats_query = "SELECT COUNT(*) AS total_seats FROM bus_seats WHERE bus_id = $bus_id";
        $seat_result = mysqli_query($conn, $check_seats_query);
        $seat_row = mysqli_fetch_assoc($seat_result);

        // Only insert seats if none exist for the bus
        if ($seat_row['total_seats'] == 0) {
            $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
            $seats_per_row = 4;

            foreach ($rows as $row) {
                for ($i = 1; $i <= $seats_per_row; $i++) {
                    $seat_code = $row . $i;
                    $query = "INSERT INTO bus_seats (bus_id, seat_code, status) VALUES ($bus_id, '$seat_code', 'available')";
                    if (!mysqli_query($conn, $query)) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        }
    }
}

// Initialize seat data and handle search functionality
$seatStatus = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['busJson'])) {
    $bus_no = $_GET['busJson'];

    // Retrieve the bus by number
    $search_query = "SELECT * FROM buses WHERE bus_no = '$bus_no'";
    $search_result = mysqli_query($conn, $search_query);

    if (mysqli_num_rows($search_result) > 0) {
        $bus = mysqli_fetch_assoc($search_result);
        $bus_id = $bus['id'];

        // Fetch all seat data for the bus
        $seats_query = "SELECT * FROM bus_seats WHERE bus_id = $bus_id";
        $seats_result = mysqli_query($conn, $seats_query);

        while ($seat = mysqli_fetch_assoc($seats_result)) {
            $seatStatus[$seat['seat_code']] = $seat['status'];
        }
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
    </style>
</head>
<body>
    <section>
            <div class="w-full max-w-sm p-4 bg-[#f0f0f0] rounded-lg shadow-xl">
                <h2 class="text-xl text-center font-semibold text-gray-800 mb-4">Seat Status</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="flex items-center ">
                        <input type="text" name="bus_no" id="bus-no" placeholder="Bus Number" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button name="submit" class="px-6 py-[9px] bg-black text-white font-medium rounded-r-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                    </div>
                </form>
            </div>

        <div id="Bus_Number" class="w-full ml-[200px] mt-24 max-w-4xl p-6 bg-[#e9e8e8] rounded-lg shadow-xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Bus Seat Reservation</h1>
            <p class="text-gray-600 mb-6 font-bold text-center">
                <?php echo isset($bus_no) ? "Bus NO: $bus_no" : "Search a Bus"; ?>
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

                    $class_left_1 = ($status_left_1 === 'booked') ? 'seat booked' : 'seat available';
                    $class_left_2 = ($status_left_2 === 'booked') ? 'seat booked' : 'seat available';
                    $class_right_1 = ($status_right_1 === 'booked') ? 'seat booked' : 'seat available';
                    $class_right_2 = ($status_right_2 === 'booked') ? 'seat booked' : 'seat available';

                    echo "<div class='col-span-2 flex justify-around cursor-pointer'>
                            <div class='$class_left_1 text-white w-16 h-12 rounded-md flex items-center justify-center'>$seat_left_1</div>
                            <div class='$class_left_2 text-white w-16 h-12 rounded-md flex items-center justify-center'>$seat_left_2</div>
                        </div>";
                    echo "<div class='col-span-1'></div>"; // Empty space
                    echo "<div class='col-span-2 flex justify-around cursor-pointer'>
                            <div class='$class_right_1 text-white w-16 h-12 rounded-md flex items-center justify-center'>$seat_right_1</div>
                            <div class='$class_right_2 text-white w-16 h-12 rounded-md flex items-center justify-center'>$seat_right_2</div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>

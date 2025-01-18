<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['submitBookingBtn'])) {
    // Fetch form data
    $customerId = mysqli_real_escape_string($conn, $_POST['customerId']);
    $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
    $customerNumber = mysqli_real_escape_string($conn, $_POST['customerNumber']);
    $route = mysqli_real_escape_string($conn, $_POST['route']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $selectBus = mysqli_real_escape_string($conn, $_POST['selectBus']);
    $seat = mysqli_real_escape_string($conn, $_POST['seat']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // Insert booking into database
    $sql = "INSERT INTO customers (id, name, phone, route, destination, bus, seat, amount) 
    VALUES ('$customerId', '$customerName', '$customerNumber', '$route', '$destination', '$selectBus', '$seat', '$amount')";

if (mysqli_query($conn, $sql)) {
// Mark the seat as booked
$updateSeat = "UPDATE seats SET status='booked' WHERE bus='$selectBus' AND seat='$seat'";
mysqli_query($conn, $updateSeat);

echo "<script>alert('Booking successful!');</script>";
} else {
echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}
}

// Fetch seat status
$seatStatus = [];
if (isset($_POST['selectBus'])) {
    $selectedBus = mysqli_real_escape_string($conn, $_POST['selectBus']);
    $result = $conn->query("SELECT seat, status FROM seats WHERE bus = '$selectedBus'");
    while ($row = $result->fetch_assoc()) {
        $seatStatus[$row['seat']] = $row['status'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Seat</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>

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
    <!-- Add Booking Model -->
        <div id="addBooking" class="bg-gradient-to-r from-yellow-600 to-orange-600 w-[230px] h-[120px] shadow-xl rounded-lg flex flex-col items-center justify-center p-4 text-white">
            <h2 class="text-2xl font-bold mb-2">Booking Status</h2>
            <button id="openModalBtn" class="mt-2 px-4 py-2 bg-white text-blue-600 rounded-full shadow hover:bg-gray-100">
                Add Bookings <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    <!-- Add Booking Model -->
    <!-- Add Booking Model Popup -->
        <div id="booking_popup" class="fixed z-10 inset-0 pt-[260px] bg-black bg-opacity-20 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white ml-28 p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[600px] max-h-[80vh] overflow-y-auto">
                <div>
                    <h2 class="text-xl font-bold flex justify-center mb-3">Make Booking System</h2>
                </div>
                <hr class="border mb-3">
                <div>
                    <label for="" class="font-semibold text-lg">Customer ID</label><br>
                    <input type="text" name="customerId" placeholder="Customer ID" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                    <label for="" class="font-semibold text-lg">Customer Name</label><br>
                    <input type="text" name="customerName" placeholder="Customer Name" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                    <label for="" class="font-semibold text-lg">Customer Number</label><br>
                    <input type="text" name="customerNumber" placeholder="Customer Number" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                    <label for="" class="font-semibold text-lg">Route</label><br>
                    <input type="text" name="route" placeholder="Route" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                    <label for="" class="font-semibold text-lg">Destination</label><br>
                    <input type="text" name="destination" placeholder="Destination" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                    <label for="" class="font-semibold text-lg">Bus Select</label><br>
                    <select name="selectBus" id="selectBus" class="w-full mt-3 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Select Bus">Select Bus</option>
                        <option value="NBS4455">NBS4455</option>
                        <option value="QWQXF65">QWQXF65</option>
                    </select>

                    <div id="busSeat" name="seat" class="grid grid-cols-5 gap-4 mb-6 hidden">
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
                    <label for="" class="font-semibold text-lg">Amount</label><br>
                    <input type="text" name="amount" placeholder="Amount" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                </div>
                <div>
                    <div class="flex justify-end gap-4">
                        <button id="cancelBookingBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button id="submitBooking" name="submitBookingBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Add Booking Model Popup -->
    <!-- Add Booking Table -->
        <div class="overflow-x-auto mt-10 ml-[10%] w-full mb-6">
            <table class="min-w-full table-auto border border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Customer ID</th>
                        <th class="border px-4 py-2">Customer Name</th>
                        <th class="border px-4 py-2">Customer Number</th>
                        <th class="border px-4 py-2">Route</th>
                        <th class="border px-4 py-2">Destination</th>
                        <th class="border px-4 py-2">Seat</th>
                        <th class="border px-4 py-2">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    ?>
                </tbody>
            </table>
        </div>

    <!-- Add Booking Table -->



    <script>
        const openModalBtn = document.getElementById("openModalBtn");
        const booking_popup = document.getElementById("booking_popup");
        const submitBooking = document.getElementById("submitBooking");
        const cancelBookingBtn = document.getElementById("cancelBookingBtn");

        openModalBtn.addEventListener('click', () => {
            booking_popup.classList.remove('hidden');
            booking_popup.classList.add('opacity-100'); 
        });

        cancelBookingBtn.addEventListener('click', () => {
            booking_popup.classList.add('hidden');
            booking_popup.classList.remove('opacity-100'); 
        });
        
        const selectBus = document.getElementById("selectBus");
        const busSeat = document.getElementById("busSeat");

        selectBus.addEventListener("change", function () {
            if (selectBus.value !== "Select Bus") {
                // Show busSeat if a valid bus is selected
                busSeat.classList.remove("hidden");
            } else {
                // Hide busSeat if "Select Bus" is chosen
                busSeat.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
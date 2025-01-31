<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$seatStatus = [];
$totalBookedSeats = 0;

if (isset($_POST['selectBus']) || isset($_GET['selectBus'])) {
    $selectedBus = ($_POST['selectBus'] ?? $_GET['selectBus']);
    
    $result = $conn->query("SELECT seat FROM bookings WHERE selectBus = '$selectedBus'");
    while ($row = $result->fetch_assoc()) {
        $bookedSeats = explode(',', $row['seat']);
        foreach ($bookedSeats as $seat) {
            $seatStatus[$seat] = 'booked';
        }
    }
    $totalBookedSeats = count($seatStatus); 
}

if (isset($_POST['submitBookingBtn'])) {
    $customerId = $_POST['customerId'];
    $customerName = $_POST['customerName'];
    $customerNumber = $_POST['customerNumber'];
    $route = $_POST['route'];
    $destination = $_POST['destination'];
    $selectBus = $_POST['selectBus'];
    $selectedSeatsString = $_POST['seats']; 
    $selectedSeatsArray = explode(',', $selectedSeatsString); 
    $seatCount = count($selectedSeatsArray);
    $amount = $seatCount * 500; 

    if ($seatCount > 4) {
        echo "<div class='bg-red-300 p-3'>You can't select more than 4 seats!</div>";
    } else {
        $customerCheckQuery = "SELECT * FROM customer WHERE customer_id = '$customerId'";
        $customerResult = $conn->query($customerCheckQuery);
        if ($customerResult->num_rows == 0) {
            $insertCustomerQuery = "INSERT INTO customer (customer_id, customer_name, customer_phone) 
                                    VALUES ('$customerId', '$customerName', '$customerNumber')";
            $conn->query($insertCustomerQuery);
        }

        $sql = "INSERT INTO bookings (customerId, customerName, customerNumber, route, destination, selectBus, seat, amount) 
                VALUES ('$customerId', '$customerName', '$customerNumber', '$route', '$destination', '$selectBus', '$selectedSeatsString', '$amount')";
        if ($conn->query($sql) === TRUE) {
            // Invoice generation logic
            $invoiceData = [
                'customerName' => $customerName,
                'customerNumber' => $customerNumber,
                'route' => $route,
                'destination' => $destination,
                'bus' => $selectBus,
                'seats' => $selectedSeatsString,
                'amount' => $amount,
            ];

            // Create an invoice as a downloadable file
            $invoiceFileName = "invoice_{$customerId}.txt";
            $invoiceFilePath = "invoices/{$invoiceFileName}";
            $invoiceContent = "Invoice for Bus Booking\n\n"
                . "Customer Name: {$invoiceData['customerName']}\n"
                . "Contact Number: {$invoiceData['customerNumber']}\n"
                . "Route: {$invoiceData['route']}\n"
                . "Destination: {$invoiceData['destination']}\n"
                . "Bus: {$invoiceData['bus']}\n"
                . "Seats: {$invoiceData['seats']}\n"
                . "Total Amount: {$invoiceData['amount']}\n";

            // Save the invoice to a file
            file_put_contents($invoiceFilePath, $invoiceContent);

            echo "<div class='bg-green-300 p-3 mb-5'>Booking added successfully! "
               . "<a href='{$invoiceFilePath}' download class='text-blue-600 underline'>Download Invoice</a></div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
// Delete
if (isset($_GET['deleteId'])) {
    $deleteId = intval($_GET['deleteId']);
    $sql = "DELETE FROM bookings WHERE id = $deleteId";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='wi-full py-3 px-4 bg-green-300 mb-5'>Booking deleted successfully!</div>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Update
if (isset($_POST['updateBookingBtn'])) {
    $editId = intval($_POST['editId']);
    $customerName = $_POST['editCustomerName'];
    $customerNumber = $_POST['editCustomerNumber'];

    $sql = "UPDATE bookings SET customerName = '$customerName', customerNumber = '$customerNumber' WHERE id = $editId";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='wi-full py-3 px-4 bg-green-300 mb-5'>Booking updated successfully!</div>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <!-- Add Booking Section -->
    <div id="addBooking" class="bg-gradient-to-r from-yellow-600 to-orange-600 w-[230px] h-[120px] shadow-xl rounded-lg flex flex-col items-center justify-center p-4 text-white">
        <h2 class="text-2xl font-bold mb-2">Booking Status</h2>
        <button id="openModalBtn" class="mt-2 px-4 py-2 bg-white text-blue-600 rounded-full shadow hover:bg-gray-100">
            Add Bookings <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <!-- Add Booking Popup -->
    <div id="booking_popup" class="fixed z-10 inset-0 pt-[260px] bg-black bg-opacity-20 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <form method="POST" action="" class="bg-white ml-28 p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[600px] max-h-[80vh] overflow-y-auto">
            <div>
                <h2 class="text-xl font-bold flex justify-center mb-3">Make Booking System</h2>
            </div>
            <hr class="border mb-3">
            <div>
                <label class="font-semibold text-lg">Customer ID</label><br>
                <input type="text" name="customerId" placeholder="Customer ID" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                <label class="font-semibold text-lg">Customer Name</label><br>
                <input type="text" name="customerName" placeholder="Customer Name" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                <label class="font-semibold text-lg">Customer Number</label><br>
                <input type="text" name="customerNumber" placeholder="Customer Number" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                <label class="font-semibold text-lg">Route</label><br>
                <input type="text" name="route" placeholder="Route" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                <label class="font-semibold text-lg">Destination</label><br>
                <input type="text" name="destination" placeholder="Destination" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
                <label class="font-semibold text-lg">Bus Select</label><br>
                <select name="selectBus" id="selectBus" class="w-full mt-3 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Select Bus">Select Bus</option>
                    <option value="NBS4455">NBS4455</option>
                    <option value="QWQXF65">QWQXF65</option>
                </select>
                    <div id="busSeat" name="seat" class="grid grid-cols-5 gap-4 mb-6 hidden">
                       <!-- Seat Grid -->
                        <!-- Driver Section -->
                        <div class="col-span-5 flex justify-end mb-4">
                            <div class="bg-gray-800 text-white cursor-pointer mr-5 px-4 py-2 rounded-md">Driver</div>
                        </div>

                        <?php
                            $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
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

                                echo "<div class='col-span-2 flex justify-around'>
                                        <div class='seat w-16 h-12 rounded-md flex items-center justify-center $class_left_1' data-seat='$seat_left_1'>$seat_left_1</div>
                                        <div class='seat w-16 h-12 rounded-md flex items-center justify-center $class_left_2' data-seat='$seat_left_2'>$seat_left_2</div>
                                    </div>";
                                echo "<div class='col-span-1'></div>"; // Empty space
                                echo "<div class='col-span-2 flex justify-around'>
                                        <div class='seat w-16 h-12 rounded-md flex items-center justify-center $class_right_1' data-seat='$seat_right_1'>$seat_right_1</div>
                                        <div class='seat w-16 h-12 rounded-md flex items-center justify-center $class_right_2' data-seat='$seat_right_2'>$seat_right_2</div>
                                    </div>";
                            }
                            ?>
                    </div>
                <input type="hidden" name="seats" id="selectedSeatsInput">
                <label class="font-semibold text-lg">Amount</label><br>
                <input type="text" name="amount" placeholder="Amount" class="w-full mt-2 border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" /> <br>
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" id="cancelBookingBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                <button type="submit" name="submitBookingBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
            </div>
        </form>
    </div>

    <!-- Booking Table -->
    <div class="overflow-x-auto mt-10  w-full mb-6">
        <table class="min-w-full table-auto border border-collapse">
            <thead>
                <tr class="bg-[#e5e7eb]">
                    <th class="border px-4 py-2">Customer ID</th>
                    <th class="border px-4 py-2">Customer Name</th>
                    <th class="border px-4 py-2">Customer Number</th>
                    <th class="border px-4 py-2">Route</th>
                    <th class="border px-4 py-2">Destination</th>
                    <th class="border px-4 py-2">Bus</th>
                    <th class="border px-4 py-2">Seat</th>
                    <th class="border px-4 py-2">Amount</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM bookings");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class='hover:bg-[#e5e7eb]'>
                        <td class='border px-4 py-2'>{$row['customerId']}</td>
                        <td class='border px-4 py-2'>{$row['customerName']}</td>
                        <td class='border px-4 py-2'>{$row['customerNumber']}</td>
                        <td class='border px-4 py-2'>{$row['route']}</td>
                        <td class='border px-4 py-2'>{$row['destination']}</td>
                        <td class='border px-4 py-2'>{$row['selectBus']}</td>
                        <td class='border px-4 py-2'>{$row['seat']}</td>
                        <td class='border px-4 py-2'>$ {$row['amount']}</td>
                        <td class='px-4 flex gap-2 py-2 border text-center'>
                            <button class='text-white rounded-md px-3 py-1 bg-blue-500 edit-button' 
                                    data-id='{$row['id']}' 
                                    data-name='{$row['customerName']}' 
                                    data-number='{$row['customerNumber']}'>
                                <i class='fas fa-edit'></i> Edit
                            </button>
                            <a href='dashboard.php?pages=booking&deleteId={$row['id']}' 
                               class='text-white rounded-md px-3 py-1 bg-red-500' 
                               onclick='return confirm(\"Are you sure you want to delete this booking?\");'>
                               <i class='fas fa-trash'></i> Delete
                            </a>
                        </td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

     <!-- Edit Modal -->
     <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <form method="POST" action="" class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-4">Edit Booking</h2>
            <input type="hidden" name="editId" id="editId" />
            <div class="mb-4">
                <label for="editCustomerName" class="block font-semibold">Customer Name</label>
                <input type="text" id="editCustomerName" name="editCustomerName" class="w-full border px-3 py-2 rounded-lg" />
            </div>
            <div class="mb-4">
                <label for="editCustomerNumber" class="block font-semibold">Customer Number</label>
                <input type="text" id="editCustomerNumber" name="editCustomerNumber" class="w-full border px-3 py-2 rounded-lg" />
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" id="cancelEdit" class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</button>
                <button type="submit" name="updateBookingBtn" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Update</button>
            </div>
        </form>
    </div>

    <script>
        const openModalBtn = document.getElementById("openModalBtn");
        const booking_popup = document.getElementById("booking_popup");
        const cancelBookingBtn = document.getElementById("cancelBookingBtn");

        openModalBtn.addEventListener("click", () => {
            booking_popup.classList.remove("hidden");
            booking_popup.classList.add("opacity-100");
        });

        cancelBookingBtn.addEventListener("click", () => {
            booking_popup.classList.add("hidden");
            booking_popup.classList.remove("opacity-100");
        });

        const selectBus = document.getElementById("selectBus");
        const busSeat = document.getElementById("busSeat");

        selectBus.addEventListener("change", () => {
            if (selectBus.value !== "Select Bus") {
                busSeat.classList.remove("hidden");
            } else {
                busSeat.classList.add("hidden");
            }
        });

        const editButtons = document.querySelectorAll('.edit-button');
        const editModal = document.getElementById('editModal');
        const editId = document.getElementById('editId');
        const editCustomerName = document.getElementById('editCustomerName');
        const editCustomerNumber = document.getElementById('editCustomerNumber');
        const cancelEdit = document.getElementById('cancelEdit');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                editId.value = button.dataset.id;
                editCustomerName.value = button.dataset.name;
                editCustomerNumber.value = button.dataset.number;
                editModal.classList.remove('hidden');
            });
        });

        cancelEdit.addEventListener('click', () => {
            editModal.classList.add('hidden');
        });

        document.addEventListener('DOMContentLoaded', () => {
            const seats = document.querySelectorAll('.seat');
            let selectedSeats = [];
            const maxSeats = 4;

            seats.forEach(seat => {
                seat.addEventListener('click', () => {
                    const seatId = seat.textContent;

                    if (seat.classList.contains('bg-red-500')) {
                        alert('This seat is already booked.');
                        return;
                    }

                    if (seat.classList.contains('bg-blue-500')) {
                        // Deselect the seat
                        seat.classList.remove('bg-blue-500');
                        seat.classList.add('bg-green-500');
                        selectedSeats = selectedSeats.filter(s => s !== seatId);
                    } else {
                        // Select the seat if under the limit
                        if (selectedSeats.length < maxSeats) {
                            seat.classList.remove('bg-green-500');
                            seat.classList.add('bg-blue-500');
                            selectedSeats.push(seatId);
                        } else {
                            alert(`You can select a maximum of ${maxSeats} seats.`);
                        }
                    }

                    console.log('Selected Seats:', selectedSeats);
                    document.getElementById('selectedSeatsInput').value = selectedSeats.join(',');
                });
            });
        });

        
        function fetchBookedSeats(busId) {
    fetch(`get_booked_seats.php?busId=${busId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(seat => {
                document.getElementById(`seat-${seat}`).classList.add("booked");
            });
        });
}

        
    </script>
</body>
</html>

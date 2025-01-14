<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

        <?php
            $busSql = "SELECT * FROM buses";
            $resultBusSql = mysqli_query($conn, $busSql);
            $arr = array();
            while($row = mysqli_fetch_assoc($resultBusSql)) {
                $arr[] = $row;
            }
            $busJson = json_encode($arr);
            
        ?>

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


            <div id="Bus_Seat">
                <?php
                if(isset($_GET["submit"])){
                    $busno = $_GET["bus-no"];
                    $sql = "SELECT * from seats WHERE bus_no = '$busno' ";
                    $result = mysqli_query($conn. $sql);
                     
                }
                ?>
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
            </div>

        
    </section>
</body>
</html>

<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Function to check if the route already exists
function exist_routes($conn, $viaCities, $departureDate, $departureTime) {
    $query = "SELECT * FROM routes 
              WHERE route_cities = '$viaCities' 
              AND route_dep_date = '$departureDate' 
              AND route_dep_time = '$departureTime' ";
              
    $result = mysqli_query($conn, $query);
    return (mysqli_num_rows($result) > 0);
}

// Check if the form is submitted
if (isset($_POST['submitRouteBtn'])) {
    $viaCities = strtoupper($_POST['viaCitiesAdd']);
    $busNumber = $_POST['Bus_Number'];
    $cost = floatval($_POST['costInp']);
    $departureDate = $_POST['departure_Date'];
    $departureTime = $_POST['departure_time'];

    $route_exists = exist_routes($conn, $viaCities, $departureDate, $departureTime);
    $route_added = false;

    if (!$route_exists) {
        $sql = "INSERT INTO routes 
    (bus_no, route_cities, route_dep_date, route_dep_time, route_step_cost, route_created) 
    VALUES ('$busNumber', '$viaCities', '$departureDate', '$departureTime', '$cost', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $autoInc_id = mysqli_insert_id($conn);

            if ($autoInc_id) {
                $code = rand(1, 99999);
                $route_id = "RT-" . $code . $autoInc_id;

                $query = "UPDATE routes SET route_id = '$route_id' WHERE id = $autoInc_id";
                $queryResult = mysqli_query($conn, $query);

                if ($queryResult) {
                    $route_added = true;
                }
            }
        } else {
            die("Error inserting route: " . mysqli_error($conn));
        }
    } else {
        echo "<strong>Error!</strong> Route already exists.";
    }

    if ($route_added) {
        echo "<div class='wi-full py-3 px-4 bg-green-300 mb-5'><strong class='text-black py-3 font-semibold'>Success!</strong> Route has been added successfully.</div>";
    }
}

// Edit Route Handling
if (isset($_POST['routeEditBtn'])) {
    $routed_id = $_POST['route_id'];
    $viaCities = strtoupper($_POST['viaCitieEdit']);
    $busNumber = $_POST['Bus_NumberEdit'];
    $cost = floatval($_POST['costInpEdit']);
    $departureDate = $_POST['departure_DateEdit'];
    $departureTime = $_POST['departure_timeEdit'];

    $updateQuery = "UPDATE routes SET route_cities = '$viaCities', bus_no = '$busNumber', route_dep_date = '$departureDate', route_dep_time = '$departureTime', route_step_cost = '$cost' WHERE route_id = '$routed_id'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "<div class='wi-full py-3 px-4 bg-green-300 mb-5'>
                <strong class='text-black py-3 font-semibold'>Success!</strong> Route updated successfully.
            </div>";
    } else {
        echo "<div class='wi-full py-3 px-4 bg-red-300 mb-5'>
                <strong class='text-black py-3 font-semibold'>Error!</strong> " . mysqli_error($conn) . "
              </div>";
    }
}

// Fetch and display all routes
$sql = "SELECT * FROM routes";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Routes</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
</head>
<body>
    <section>
        <div>
            <div class="bg-gradient-to-r from-yellow-600 to-orange-600 w-[230px] h-[120px] shadow-xl rounded-lg flex flex-col items-center justify-center p-4 text-white">
                <h2 class="font-semibold text-xl">Route Status</h2>
                <button id="openAddRoute" class="mt-2 font-semibold px-4 py-2 bg-white text-blue-600 rounded-full shadow hover:bg-gray-100">Add Route Details</button>
            </div>
        </div>
        <!-- open Add Route Popup  Start-->
         <div id="openRouteAdd" class="fixed z-10 inset-0 pt-[260px] bg-black bg-opacity-20 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white ml-28 p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[400px]">
                <div class="text-center font-semibold text-black text-2xl mb-3">
                    <h2>Add A Route</h2>
                </div>
                <hr class="mb-2">
                <form action="" method="POST">
                    <div>
                        <!-- Via Citiy -->
                        <label for="" class="font-semibold text-lg">Via Cities</label><br>
                        <input type="text" name ="viaCitiesAdd" placeholder="Add Via Cities" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"/> <br>
                        <!-- Bus Number -->
                        <label for="" class="font-semibold text-lg">Bus Number</label><br>
                        <input type="text" name="Bus_Number" id="Bus_Number" placeholder="Bus Number" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"/><br>
                        <!-- Cost -->
                        <label for="" class="font-semibold text-lg">Cost</label><br>
                        <input type="text" name="costInp" id="cost" placeholder="Cost" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                        <!-- Departure Date -->
                        <label for="" class="font-semibold text-lg">Departure Date</label><br>
                        <input type="date" name="departure_Date" id="departure_Date" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                        <!-- Departure Time -->
                        <label for="" class="font-semibold text-lg">Departure Time</label><br>
                        <input type="time" name="departure_time" id="time" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                    </div>
                    <div class="flex justify-end gap-4">
                        <button id="cancelRouteBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button id="submitRoute" name="submitRouteBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
         </div>
        <!-- open Add Route Popup  End-->
        <!-- Open Edit Route Popup  -->
            <div id="editPopup" class="fixed z-10 inset-0 pt-[260px] bg-black bg-opacity-20 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
                <div class="bg-white ml-28 p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[400px]">
                    <div class="text-center font-semibold text-black text-2xl mb-3">
                        <h2>Route Edit</h2>
                    </div>
                    <form action="" method="POST">
                    <div>
                        <!-- Edit Via Citiy -->
                        <input type="hidden" name="route_id">
                        <label for="" class="font-semibold text-lg">Via Cities</label><br>
                        <input type="text" name ="viaCitieEdit" placeholder="Add Via Cities" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"/> <br>
                        <!--Edit Bus Number -->
                        <label for="" class="font-semibold text-lg">Bus Number</label><br>
                        <input type="text" name="Bus_NumberEdit" id="Bus_Number" placeholder="Bus Number" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"/><br>
                        <!--Edit Cost -->
                        <label for="" class="font-semibold text-lg">Cost</label><br>
                        <input type="text" name="costInpEdit" id="cost" placeholder="Cost" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                        <!--Edit Departure Date -->
                        <label for="" class="font-semibold text-lg">Departure Date</label><br>
                        <input type="date" name="departure_DateEdit" id="departure_Date" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                        <!--Edit Departure Time -->
                        <label for="" class="font-semibold text-lg">Departure Time</label><br>
                        <input type="time" name="departure_timeEdit" id="time" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
                    </div>
                    <div class="flex justify-end gap-4">
                        <button id="cancelEditBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button id="routeEditBtn" name="routeEditBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        <!-- Open Edit Route Popup End -->
        <!-- Route Table Display -->
        <div class="overflow-x-auto mt-10 ml-[10%] w-full mb-6">
            <table class="min-w-full border-2 border-gray-200 table-auto border-collapse">
                <thead>
                    <tr class="bg-slate-300">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Via Cities</th>
                        <th class="px-4 py-2 border">Bus</th>
                        <th class="px-4 py-2 border">Departure Date</th>
                        <th class="px-4 py-2 border">Departure Time</th>
                        <th class="px-4 py-2 border">Cost</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class = 'hover:bg-slate-300'>
                                <td class='border px-4 py-2'>{$row['route_id']}</td>
                                <td class='border px-4 py-2'>{$row['route_cities']}</td>
                                <td class='border px-4 py-2'>{$row['bus_no']}</td>
                                <td class='border px-4 py-2'>{$row['route_dep_date']}</td>
                                <td class='border px-4 py-2'>{$row['route_dep_time']}</td>
                                <td class='border px-4 py-2'>$ {$row['route_step_cost']}</td>
                                <td class='px-4 flex gap-2 py-2 border text-center'>
                                    <button id='editButton' class='text-white rounded-md px-3 py-1 bg-orange-500'
                                        data-id='{$row['route_id']}' 
                                        data-cities='{$row['route_cities']}' 
                                        data-bus='{$row['bus_no']}' 
                                        data-date='{$row['route_dep_date']}' 
                                        data-time='{$row['route_dep_time']}' 
                                        data-cost='{$row['route_step_cost']}'
                                    >
                                        <i class='fas fa-edit'></i> Edit
                                    </button>
                                    <button id='deleteButton' class='text-white rounded-md px-3 py-1 bg-orange-500'>
                                        <i class='fas fa-trash'></i> Delete
                                    </button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center py-4'>No routes found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </section>



    <script>

        // Add Route Popup......
        const clickRoutePopup = document.getElementById('openAddRoute');
        const openRoutePopup = document.getElementById('openRouteAdd');
        const cancelRoutePopup = document.getElementById('cancelRouteBtn');

        clickRoutePopup.addEventListener('click', ()=>{
            openRoutePopup.classList.remove('hidden', 'opacity-0');

        })
        cancelRoutePopup.addEventListener('click', (event) =>{
            event.preventDefault();
            openRoutePopup.classList.add('hidden');
        })

        document.querySelectorAll('#editButton').forEach(button => {
                button.addEventListener('click', function () {
                    const editPopup = document.getElementById('editPopup');

                    // Populate fields
                    const routeId = this.getAttribute('data-id');
                    const cities = this.getAttribute('data-cities');
                    const bus = this.getAttribute('data-bus');
                    const date = this.getAttribute('data-date');
                    const time = this.getAttribute('data-time');
                    const cost = this.getAttribute('data-cost');

                    editPopup.querySelector('input[name="route_id"]').value = routeId;
                    editPopup.querySelector('input[name="viaCitieEdit"]').value = cities;
                    editPopup.querySelector('input[name="Bus_NumberEdit"]').value = bus;
                    editPopup.querySelector('input[name="departure_DateEdit"]').value = date;
                    editPopup.querySelector('input[name="departure_timeEdit"]').value = time;
                    editPopup.querySelector('input[name="costInpEdit"]').value = cost;

                    editPopup.classList.remove('hidden', 'opacity-0');
                });
            });

            document.getElementById('cancelEditBtn').addEventListener('click', function (event) {
                event.preventDefault();
                document.getElementById('editPopup').classList.add('hidden', 'opacity-0');
            });


        
 
    </script>
</body>
</html>
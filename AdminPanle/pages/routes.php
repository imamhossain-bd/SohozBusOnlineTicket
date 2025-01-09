<?php
@include '../Includs/db.php';




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
                        <input type="text" name="cost" id="cost" placeholder="Cost" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"><br>
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
        <!-- Route Table Display -->
        <div class="overflow-x-auto mt-10 ml-[40%] w-full mb-6">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr>
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
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                
                                ';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
    </section>



    <script>
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

 
    </script>
</body>
</html>
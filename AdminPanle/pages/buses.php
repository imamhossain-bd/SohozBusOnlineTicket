<?php

$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['submitBtn'])){
        $busNumber = $_POST['busNumber'];
        $sql = $conn->query("INSERT INTO buses (bus_no, bus_create) VALUES ('$busNumber', current_timestamp());");
        if($sql){
            echo "Success Full";
        }
        else{
            echo "Error";
        }
    }
}

$sql = "SELECT * FROM buses"; // Query to get bus details
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section id="content" class="w-full">
        <div class="">
            <div class="bg-gradient-to-r from-yellow-600 to-orange-600 w-[230px] h-[120px] shadow-xl rounded-lg flex flex-col items-center justify-center p-4 text-white">
                <h2 class="text-xl font-bold mb-2">Bus Status</h2>
                <button id="openModalBtn" class="mt-2 px-4 py-2 bg-white text-blue-600 rounded-full shadow hover:bg-gray-100">
                    Add Bus Details
                </button>
            </div>
            <!-- Popup Form -->
            <div id="modal" class="fixed inset-0 pt-36 bg-black bg-opacity-20 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
                <div class="bg-white ml-28 p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[400px]">
                    <form action="" method="POST">
                        <div>
                            <label class="text-lg font-bold mb-4 text-gray-800">Add Bus Details</label>
                            <input type="text" name="busNumber" placeholder="Enter Bus Number" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                        </div>
                        <div class="flex justify-end gap-4">
                            <button id="cancelBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                            <button id="submit" name="submitBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End The Popup Form -->

            <!-- Bus Table Display Start-->
            <div class="overflow-x-auto mt-10 ml-[50%] w-full mb-6">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Bus Number</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="px-4 py-2 border"><?php echo $row['id']; ?></td>
                                    <td class="px-4 py-2 border"><?php echo $row['bus_no']; ?></td>
                                    <td class="px-4 py-2 border"><?php echo $row['bus_create']; ?></td>
                                    <td class="px-4 py-2 border text-center">
                                        <!-- Edit Button -->
                                        <a href="#" class="text-blue-500 hover:text-blue-700" onclick="openEditPopup(<?php echo $row['id']; ?>, '<?php echo $row['bus_no']; ?>')">
                                            <i class="fas fa-edit"></i> Edit
                                        </a> |
                                        <!-- Delete Button -->
                                        <a href="?delete=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this bus?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center border">No buses available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- Bus Table Display End-->

        </div>
    </section>


    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('modal');
        const cancelBtn = document.getElementById('cancelBtn');
        const content = document.getElementById('content');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden', 'opacity-0');
            modal.classList.add('opacity-100');
            modal.classList.remove('-translate-y-20');
            modal.classList.add('translate-y-0');
        });
        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('translate-y-0');
            modal.classList.add('-translate-y-20');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        })
    </script>
</body>
</html>

<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitBtn'])) {
        $busNumber = $_POST['busNumber'];
        $sql = $conn->query("INSERT INTO buses (bus_no, bus_create) VALUES ('$busNumber', current_timestamp());");
        if ($sql) {
            echo "Success Full";
        } else {
            echo "Error";
        }
    }

    if (isset($_POST['editSubmitBtn'])) {
        $busId = $_POST['editBusId'];
        $updateBusNum = $_POST['editBusNum'];

        $sql = "UPDATE buses SET bus_no = '$updateBusNum' WHERE id = '$busId'";
        if ($conn->query($sql)) {
            echo "<div class='wi-full py-3 px-4 bg-green-300 mb-5'><strong class='text-black py-3 font-semibold'>Success!</strong> Bus has been Edit successfully.</div>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM buses";
$result = $conn->query($sql);

ob_end_flush();
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
                        <input type="text" name="busNumber" placeholder="Enter Bus Number" class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="flex justify-end gap-4">
                        <button id="cancelBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button id="submit" name="submitBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Popup Form -->

        <!-- Edit Popup Form Start -->
        <div id="editFrom" class="fixed flex ml-[300px] items-center justify-center bg-opacity-20 pt-36 hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white p-6 transform -translate-y-20 transition-transform duration-300 rounded-lg shadow-xl w-[400px]">
                <h2 class="font-bold mb-3 mt-2">Edit Bus Number</h2>
                <form action="" method="POST" id="editForm">
                    <input type="hidden" name="editBusId" id="editBusId">
                    <input type="text" name="editBusNum" id="editBusNum" placeholder="Bus Number Update" 
                        class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="flex justify-end gap-4">
                        <button type="button" id="editCancelBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
                        <button type="submit" id="editSubmitBtn" name="editSubmitBtn" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit Popup Form End -->

        <!-- Bus Table Display Start -->
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
                <?php
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <tr>
                                <td class="px-4 py-2 border">' . $count++ . '</td>
                                <td class="px-4 py-2 border">' . $row["bus_no"] . '</td>
                                <td class="px-4 py-2 border">' . $row["bus_create"] . '</td>
                                <td class="px-4 flex gap-2 py-2 border text-center">
                                    <a href="#" 
                                       class="text-white rounded-md px-3 py-1 bg-orange-500 edit-button" 
                                       data-id="' . $row["id"] . '" 
                                       data-bus-no="' . $row["bus_no"] . '">
                                       <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="Delete/delete_buses.php?id=' . $row["id"] . '" 
                                       class="text-white rounded-md px-3 py-1 bg-orange-500" 
                                       onclick="return confirm(\'Are you sure you want to delete this bus?\');">
                                       <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        ';
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center py-4'>No Bus Available</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- Bus Table Display End -->
    </div>
</section>

<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const modal = document.getElementById('modal');
    const cancelBtn = document.getElementById('cancelBtn');
    const editPopup = document.getElementById('editFrom');
    const editCancelBtn = document.getElementById('editCancelBtn');

    // Show Add Modal
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden', 'opacity-0');
        modal.classList.add('opacity-100');
    });

    // Hide Add Modal
    cancelBtn.addEventListener('click', (event) => {
        event.preventDefault();
        modal.classList.add('hidden');
    });

    // Handle Edit Button Click
    const editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const busId = button.getAttribute('data-id');
            const busNo = button.getAttribute('data-bus-no');

            document.getElementById('editBusId').value = busId;
            document.getElementById('editBusNum').value = busNo;

            editPopup.classList.remove('hidden', 'opacity-0');
            editPopup.classList.add('opacity-100');
        });
    });

    // Hide Edit Modal
    editCancelBtn.addEventListener('click', (event) => {
        event.preventDefault();
        editPopup.classList.add('hidden');
    });
</script>
</body>
</html>

<?php

$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

// Insert a new bus record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitBtn'])) {
        $addBus = $_POST['addBus'];
        $sql = $conn->query("INSERT INTO buses (bus_no, bus_create) VALUES ('$addBus', current_timestamp());");
        if ($sql) {
            echo "SUCCESSFUL";
        } else {
            echo "Error";
        }
    }

    // Update bus number
    if (isset($_POST['editBtn'])) {
        $busId = $_POST['busId'];
        $newBusNo = $_POST['newBusNo'];
        $updateQuery = $conn->query("UPDATE buses SET bus_no = '$newBusNo' WHERE id = '$busId'");
        if ($updateQuery) {
            echo "Bus updated successfully!";
        } else {
            echo "Error updating bus.";
        }
    }
}

// Delete bus record
if (isset($_GET['delete'])) {
    $busId = $_GET['delete'];
    $deleteQuery = $conn->query("DELETE FROM buses WHERE id = '$busId'");
    if ($deleteQuery) {
        echo "Bus deleted successfully!";
    } else {
        echo "Error deleting bus.";
    }
}

// Fetch bus data
$result = $conn->query("SELECT id, bus_no, bus_create FROM buses");

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
        <div class="text-center mt-4 w-[250px] h-auto  bg-white shadow-lg rounded-lg p-5 mb-4">
            <h2 class="text-2xl mb-2 font-semibold text-gray-800">Bus Status</h2>
            <div>
                <button id="openPopup" class="flex items-center ml-4 gap-2 bg-gradient-to-r from-green-400 to-blue-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300">
                    <i class="fas fa-plus"></i> Add Bus Details
                </button>
            </div>
        </div>
        <section class="px-4 ml-[50%] w-full py-3">
        <!-- Bus Data Table -->
        <div class="overflow-x-auto mb-6">
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
                        <?php while($row = $result->fetch_assoc()): ?>
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
        <!-- Add Bus Popup Form -->
        <div id="popupForm" class="fixed inset-0 bg-gray-400 bg-opacity-50 flex justify-center items-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-sm transform -translate-y-20 transition-transform duration-300">
                <div class="p-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Bus</h2>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <div class="mb-4">
                            <label for="addBus" class="block text-sm font-medium text-gray-700 mb-1">Bus Number</label>
                            <input id="addBus" name="addBus" type="text" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="flex justify-end gap-3">
                            <button id="closePopup" type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300">Cancel</button>
                            <button type="submit" name="submitBtn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Edit Bus Popup Form -->
        <div id="editPopupForm" class="fixed inset-0 bg-gray-400 bg-opacity-50 flex justify-center items-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-sm transform -translate-y-20 transition-transform duration-300">
                <div class="p-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Bus</h2>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <input type="hidden" name="busId" id="editBusId">
                        <div class="mb-4">
                            <label for="newBusNo" class="block text-sm font-medium text-gray-700 mb-1">New Bus Number</label>
                            <input id="newBusNo" name="newBusNo" type="text" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="flex justify-end gap-3">
                            <button id="closeEditPopup" type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300">Cancel</button>
                            <button type="submit" name="editBtn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        const openPopup = document.getElementById('openPopup');
        const closePopup = document.getElementById('closePopup');
        const popupForm = document.getElementById('popupForm');
        const popupContent = popupForm.querySelector('div');
        const editPopupForm = document.getElementById('editPopupForm');
        const closeEditPopup = document.getElementById('closeEditPopup');
        const editBusId = document.getElementById('editBusId');
        const newBusNo = document.getElementById('newBusNo');

        openPopup.addEventListener('click', () => {
            popupForm.classList.remove('hidden', 'opacity-0');
            popupForm.classList.add('opacity-100');
            popupContent.classList.remove('-translate-y-20');
            popupContent.classList.add('translate-y-0');
        });

        closePopup.addEventListener('click', () => {
            popupForm.classList.remove('opacity-100');
            popupForm.classList.add('opacity-0');
            popupContent.classList.remove('translate-y-0');
            popupContent.classList.add('-translate-y-20');
            setTimeout(() => {
                popupForm.classList.add('hidden');
            }, 300);
        });

        closeEditPopup.addEventListener('click', () => {
            editPopupForm.classList.remove('opacity-100');
            editPopupForm.classList.add('opacity-0');
            setTimeout(() => {
                editPopupForm.classList.add('hidden');
            }, 300);
        });

        // Function to open the edit popup and fill the form with current bus details
        function openEditPopup(id, busNo) {
            editPopupForm.classList.remove('hidden', 'opacity-0');
            editPopupForm.classList.add('opacity-100');
            editBusId.value = id;
            newBusNo.value = busNo;
        }
    </script>
</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$result = mysqli_query($conn, "SELECT DISTINCT customerName, customerNumber FROM bookings");


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
    <title>Customer </title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <div>
            <div class="overflow-x-auto ml-[50%] mt-[10%]  w-full mb-6">
                <table class="min-w-full table-auto border border-collapse">
                    <thead>
                        <tr class="bg-[#e5e7eb]">
                            <th class="border px-4 py-2">Customer ID</th>
                            <th class="border px-4 py-2">Customer Name</th>
                            <th class="border px-4 py-2">Customer Number</th>
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
        </div>
    </section>




    <script>
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
    </script>
</body>
</html>
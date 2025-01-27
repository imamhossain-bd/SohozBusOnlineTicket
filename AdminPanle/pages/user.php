<?php
$conn = mysqli_connect("localhost", "root", "", "shohoz_bus");
$success_message = '';

// Handle type Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateUserBtn'])) {
        $updatetype = $conn->real_escape_string($_POST['type']);
        $updateId = $conn->real_escape_string($_POST['userId']);

        $update_user = "UPDATE users SET type = '$updatetype' WHERE id = '$updateId'";
        if (mysqli_query($conn, $update_user)) {
            $success_message = "User Updated successfully!";
            header("Location:dashboard.php?pages=user&success_message=" . urlencode($success_message));
            exit();
        } else {
            $error = "Failed to update user type.";
        }
    }

    // Handle User Deletion
    if (isset($_POST['deleteUserBtn'])) {
        $deleteId = $conn->real_escape_string($_POST['userId']);

        $delete_user = $conn->query("DELETE FROM users WHERE id = '$deleteId'");
        if ($delete_user) {
            $success_message = "User Deleted successfully!";
            header("Location:dashboard.php?pages=user&success_message=" . urlencode($success_message));
            exit();
        } else {
            $error = "Failed to delete user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <style>
        .toast {
            transition: opacity 2s ease-in-out;
        }
        .toast-hidden {
            opacity: 0;
            visibility: hidden;
        }
        .toast-visible {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <?php if (isset($_GET['success_message'])) { ?>
        <div id="successMessage" class="toast toast-top toast-center toast-visible z-30">
            <div class="alert alert-success">
                <span class="text-white"><?= htmlspecialchars($_GET['success_message']) ?></span>
            </div>
        </div>
    <?php } ?>

    <section class="pt-14">
        <div class="w-full">
        <h3 class="lg:text-5xl md:text-4xl text-2xl w-full uppercase ml-[65%] mb-5">Manage Users</h3>
            <table class=" ml-[40%] table table-xs md:table-md mb-20">
                <thead>
                    <tr class="bg-gray-200 text-black border-b text-center text-xs md:text-sm font-thin">
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                   <?php
                    $getUsers = $conn->query("SELECT * FROM users");
                    if ($getUsers->num_rows > 0) {
                        $counter = 1;
                        while ($row = $getUsers->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $type = $row['type'];
                            $photo = $row['photo'];
                            $photo_mime = $row['mime_type'];
                            echo "
                                <tr class=' text-xs md:text-sm text-center'>
                                    <td>
                                      $counter
                                    </td>
                                    <td>
                                        <img class='h-10 w-10 object-cover rounded-full' 
                                            src='data:$photo_mime;base64," . base64_encode($photo) . "' alt='User Photo'>
                                    </td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$type</td>
                                    <td>
                                        <button data-tip='Edit User' class='tooltip px-3 py-1 rounded-md text-xs md:text-sm border border-blue-500 font-medium 
                                                        hover:text-white hover:bg-blue-500 transition duration-150' 
                                                        onclick=\"openUpdateModal($id, '$type')\">
                                            <i class='fa-solid fa-pen-to-square'></i>
                                        </button>
                                        <button data-tip='delete user' class='tooltip px-3 py-1 rounded-md text-xs md:text-sm border border-red-500 font-medium 
                                                        hover:text-white hover:bg-red-500 transition duration-150' 
                                                        onclick=\"openModal($id, '$name')\">
                                            <i class='fa-solid fa-trash-can'></i>
                                        </button>
                                    </td>
                                </tr>
                            ";
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>Users not found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modals -->
        <!-- Update Modal -->
        <div id="updateModel" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('updateModel')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <h3 class="text-xl font-normal text-gray-500 mb-6">Update User Details</h3>
                    <form id="updateUserForm" action="" method="POST">
                        <input type="hidden" id="updateUserId" name="userId" />
                        <div class="mb-4">
                            <label for="updatetype">type</label>
                            <select id="updatetype" name="type" class="w-full px-3 py-2 mt-2 border rounded-md">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" name="updateUserBtn" class="text-white bg-blue-600 px-4 py-2 rounded-md">Update User</button>
                            <button type="button" onclick="closeModal('updateModel')" class="bg-gray-200 px-4 py-2 rounded-md">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('modelConfirm')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </button>
                </div>
                <div class="p-6 pt-0 text-center">
                    <h3 class="text-xl font-normal text-gray-500 mb-6">Are you sure you want to delete <span id="deleteUserName"></span>?</h3>
                    <form method="POST" id="deleteForm">
                        <input type="hidden" id="deleteUserId" name="userId">
                        <button type="submit" name="deleteUserBtn" class="text-white bg-red-600 px-4 py-2 rounded-md">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function openUpdateModal(userId, type) {
            document.getElementById('updateUserId').value = userId;
            document.getElementById('updatetype').value = type;
            document.getElementById('updateModel').style.display = 'block';
        }

        function openModal(userId, name) {
            document.getElementById('deleteUserName').innerText = name;
            document.getElementById('deleteUserId').value = userId;
            document.getElementById('modelConfirm').style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>
</html>

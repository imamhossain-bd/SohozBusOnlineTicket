<?php
    @require("../Includs/db.php");
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
    <section class="px-4 py-3">
        <!-- Add Buses -->
        <div class="text-center mt-4 bg-white shadow-lg rounded-lg p-5 mb-4">
            <h2 class="text-2xl mb-2 font-semibold text-gray-800">Bus Status</h2>
            <div>
                <button id="openPopup" class="flex items-center gap-2 bg-gradient-to-r from-green-400 to-blue-500 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300">
                    <i class="fas fa-plus"></i> Add Bus Details
                </button>
            </div>
        </div>

        <!-- Popup Form -->
        <div id="popupForm" class="fixed inset-0 bg-gray-400 bg-opacity-50 flex justify-center items-center hidden opacity-0 transition-opacity duration-300">
            <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-sm transform -translate-y-20 transition-transform duration-300">
                <div class="p-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Add A Bus</h2>
                    <form id="form">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Bus Number</label>
                            <input id="name" type="text" placeholder="Enter your name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="flex justify-end gap-3">
                            <button id="closePopup" type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">Submit</button>
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
        const form = document.getElementById('form');

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

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            alert(`Form submitted! Name: ${document.getElementById('name').value}`);
            closePopup.click(); // Close the popup after submission
        });
    </script>
</body>

</html>
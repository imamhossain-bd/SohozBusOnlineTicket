<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<style>
    /* .input[type="checkbox"] {
        display: none;
    }
    .custom-checkbox {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 2px solid #333;
        border-radius: 42px;
        position: relative;
        cursor: pointer;
    }
    .custom-checkbox::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: #333;
        border-radius: 42px;
        opacity: 0;
    }
    .input[type="checkbox"]:checked + .custom-checkbox::after {
        opacity: 1;
    } */

     /* Custom scrollbar for dropdown */
     .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
        }
</style>
<body>
    <section>
        <div class="bg-[url('https://i.ibb.co/Jj5HQ4K/hero-illustration.webp')] bg-cover bg-center h-[19rem] pt-36 px-[10rem]">
            <!-- <div class="bg-[#fffffff2] mx-sm:p-2 max-w-full mx-auto relative w-full rounded-3xl h-[135px]">
                <div class="flex ml-10 pt-5 items-center space-x-4 mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tripType" class="h-5 w-5 text-black" >
                        <span class="text-gray-700 font-medium">One Way</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tripType" class="h-5 w-5 text-green-600">
                        <span class="text-gray-700 font-medium">Round Way</span>
                    </label>
                </div>
                <form action="" class="">
                    
                </form>
            </div> -->

            <div class="w-full max-w-5xl bg-white p-6 rounded-lg shadow-lg">
            <div class="flex ml-10 pt-5 items-center space-x-4 mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tripType" class="h-5 w-5 text-black" >
                        <span class="text-gray-700 font-medium">One Way</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tripType" class="h-5 w-5 text-green-600">
                        <span class="text-gray-700 font-medium">Round Way</span>
                    </label>
                </div>
        <div class="flex items-center gap-4">
            <!-- Trip Type -->
                

            <!-- Search Form -->
            <div class="flex flex-grow items-center bg-gray-50 rounded-lg p-4 shadow">
                <!-- From Input -->
                <div class="relative w-1/4">
                    <input id="from" type="text" placeholder="From" class="w-full p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <div id="fromDropdown" class="dropdown-menu hidden absolute top-full left-0 bg-white border border-gray-200 rounded-md mt-1 shadow-lg z-10">
                        <ul>
                            <!-- PHP for dynamic options -->
                            <?php
                            $destinations = ["Dhaka", "Chittagong", "Sylhet", "Rajshahi", "Khulna"];
                            foreach ($destinations as $destination) {
                                echo "<li class='p-2 hover:bg-gray-100 cursor-pointer'>$destination</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <!-- To Input -->
                <div class="relative w-1/4 ml-4">
                    <input id="to" type="text" placeholder="To" class="w-full p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <div id="toDropdown" class="dropdown-menu hidden absolute top-full left-0 bg-white border border-gray-200 rounded-md mt-1 shadow-lg z-10">
                        <ul>
                            <!-- PHP for dynamic options -->
                            <?php
                            foreach ($destinations as $destination) {
                                echo "<li class='p-2 hover:bg-gray-100 cursor-pointer'>$destination</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <!-- Journey Date -->
                <div class="w-1/4 ml-4">
                    <input type="date" class="w-full p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Return Date -->
                <div class="w-1/4 ml-4">
                    <input type="date" class="w-full p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Search Button -->
                <button class="ml-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Search
                </button>
            </div>
        </div>
    </div>

        </div>
    </section>


      <script>
        // Show dropdowns for "From" and "To"
        document.getElementById('from').addEventListener('focus', () => {
            document.getElementById('fromDropdown').classList.remove('hidden');
        });

        document.getElementById('to').addEventListener('focus', () => {
            document.getElementById('toDropdown').classList.remove('hidden');
        });

        // Hide dropdowns when input is blurred
        document.getElementById('from').addEventListener('blur', () => {
            setTimeout(() => {
                document.getElementById('fromDropdown').classList.add('hidden');
            }, 100);
        });

        document.getElementById('to').addEventListener('blur', () => {
            setTimeout(() => {
                document.getElementById('toDropdown').classList.add('hidden');
            }, 100);
        });

        // Select dropdown value for "From"
        document.querySelectorAll('#fromDropdown li').forEach(item => {
            item.addEventListener('click', (e) => {
                document.getElementById('from').value = e.target.textContent;
            });
        });

        // Select dropdown value for "To"
        document.querySelectorAll('#toDropdown li').forEach(item => {
            item.addEventListener('click', (e) => {
                document.getElementById('to').value = e.target.textContent;
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans">
<?php
    require('../Includs/header.php')
    ?>
  <div class="max-w-6xl mx-auto py-6">
    <!-- Search Header -->
    <div class="bg-white p-6 rounded-lg shadow">
      <form class="flex items-center gap-4">
        <input type="text" placeholder="Dhaka" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-500" />
        <span class="text-2xl">&#8594;</span>
        <input type="text" placeholder="Barisal" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-500" />
        <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-500" />
        <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg">Search</button>
      </form>
    </div>

    <!-- Filters and Results -->
    <div class="grid grid-cols-12 gap-6 mt-6">
      <!-- Filters -->
      <div class="col-span-3 bg-white p-4 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Filters</h3>

        <!-- Bus Type -->
        <div class="mb-4">
          <h4 class="font-medium">Bus Type</h4>
          <div>
            <label class="flex items-center space-x-2 mt-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>AC</span>
            </label>
            <label class="flex items-center space-x-2 mt-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Non AC</span>
            </label>
          </div>
        </div>

        <!-- Operators -->
        <div class="mb-4">
          <h4 class="font-medium">Operator</h4>
          <div class="space-y-2">
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Green Line Paribahan</span>
            </label>
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Labiba Classic Ltd</span>
            </label>
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Sheba Green Line</span>
            </label>
          </div>
        </div>

        <!-- Boarding Points -->
        <div>
          <h4 class="font-medium">Boarding Point</h4>
          <div class="space-y-2">
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Dhaka (Abdullahpur)</span>
            </label>
            <label class="flex items-center space-x-2">
              <input type="checkbox" class="text-green-500 border-gray-300 rounded" />
              <span>Dhaka (Saydabad)</span>
            </label>
          </div>
        </div>
      </div>

      <!-- Results -->
      <div class="col-span-9">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Available Buses</h3>
          <div>
            <button class="px-4 py-2 bg-gray-200 rounded-lg">Low to High</button>
            <button class="px-4 py-2 bg-gray-200 rounded-lg">High to Low</button>
          </div>
        </div>

        <!-- Bus Card -->
        <div class="bg-white p-4 rounded-lg shadow mb-4 flex items-center justify-between">
          <div>
            <h4 class="font-semibold">Labiba Classic Ltd</h4>
            <p class="text-sm text-gray-500">Route: Shibbari - Gazipur - Abdullahpur - Saydabad - Barisal - Swarupkathi</p>
            <p class="text-sm text-gray-500">Departure: 12:00 AM | Arrival: 4:45 AM</p>
          </div>
          <div>
            <p class="text-lg font-bold">&#2547;650</p>
            <p class="text-sm text-gray-500">31 Seats Available</p>
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Book Ticket</button>
          </div>
        </div>

        <!-- Another Bus Card -->
        <div class="bg-white p-4 rounded-lg shadow mb-4 flex items-center justify-between">
          <div>
            <h4 class="font-semibold">Sheba Green Line</h4>
            <p class="text-sm text-gray-500">Route: Dhaka - Gazipur - Barisal - Kuakata</p>
            <p class="text-sm text-gray-500">Departure: 12:30 AM | Arrival: 6:00 AM</p>
          </div>
          <div>
            <p class="text-lg font-bold">&#2547;500</p>
            <p class="text-sm text-gray-500">44 Seats Available</p>
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Book Ticket</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

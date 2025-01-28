<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php
        $sidebarLinks = [
            ['name' => 'Profile Update', 'icon' => 'person', 'url' => 'profile_update.php'],
            ['name' => 'Total Tickets', 'icon' => 'confirmation_number', 'url' => 'total_tickets.php'],
            ['name' => 'Payment History', 'icon' => 'payment', 'url' => 'payment_history.php'],
            ['name' => 'Logout', 'icon' => 'logout', 'url' => 'logout.php']
        ];
        ?>
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h2 class="text-lg font-bold">User Dashboard</h2>
            </div>
            <nav>
                <ul>
                    <?php foreach ($sidebarLinks as $link): ?>
                        <li class="px-4 py-2 hover:bg-gray-700">
                            <a href="<?= $link['url']; ?>" class="flex items-center">
                                <span class="material-icons mr-2"><?= $link['icon']; ?></span>
                                <?= $link['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <?php
            $user = [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'profile_photo' => 'https://via.placeholder.com/40'
            ];
            ?>
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Update Profile</h1>
                <div class="flex items-center space-x-4">
                    <img src="<?= $user['profile_photo']; ?>" alt="Profile" class="rounded-full w-10 h-10">
                    <button class="bg-gray-100 p-2 rounded-full hover:bg-gray-200">
                        <span class="material-icons">settings</span>
                    </button>
                </div>
            </header>

            <!-- Profile Update Form -->
            <main class="flex-grow p-6">
                <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-bold text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="<?= $user['name']; ?>">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-bold text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="<?= $user['email']; ?>">
                        </div>

                        <div class="mb-4">
                            <label for="profile_photo" class="block text-sm font-bold text-gray-700">Profile Photo</label>
                            <input type="file" id="profile_photo" name="profile_photo" class="mt-1 block w-full text-gray-700">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Update Profile</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/icon?family=Material+Icons');
    </style>
</body>
</html>

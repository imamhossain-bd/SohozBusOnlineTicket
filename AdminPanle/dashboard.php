
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
    <div class="flex h-[100vh]">

        <div class="w-[20%]" clicked>
            <div class="fixed">
            <?php require_once("./pages/siderbar.php")?>
            </div>
        </div>

        <div class="w-[80%] flex h-full">
            <div class="z-50">
                <?php require_once("./pages/navbar.php")?>
            </div>
            <div>
            <main class="flex-1 mt-24 -z-50">
                <?php
                $page = isset($_GET['pages']) ? $_GET['pages'] : 'dashboard';
                $file = "./pages/{$page}.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    echo "<h1 class='text-2xl'>Page not found</h1>";
                }
                ?>
            </main>
            </div>
        </div>
    </div>
    </section>
    
</body>
</html>
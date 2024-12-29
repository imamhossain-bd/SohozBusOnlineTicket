<?php
session_start();

@include('./Includes/db.php'); 
@include('./Includes/auth_session.php');

?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <section>
        <aside class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-all duration-200 -translate-x-full bg-[#f8f9fa] border-0 shadow-none xl:ml-4 dark:bg-[#f8f9fa] ease-soft-in-out z-990 max-w-64 rounded-2xl xl:translate-x-0 xl:bg-transparent ps ps--active-y">
            <div class="h-20">

                <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href="" target="_blank">
                
                <img src="https://i.ibb.co.com/5Y53PdM/shohoz-logo-new.png" class="hidden h-full max-w-full transition-all duration-200 ease-soft-in-out  max-h-9 ml-4 dark:inline-block" alt="main_logo">
                </a>
                <div class="text-center">
                    <p class=" font-semibold transition-all text-lg ml-[-5px] duration-200 text-[#3a3a3a] ">Imam Hossain</p>
                </div>
                <hr class="mx-6 mt-3 ">
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 139px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 18px;"></div>
            </div>
        </aside> 
    </section>
    
</body>
</html>
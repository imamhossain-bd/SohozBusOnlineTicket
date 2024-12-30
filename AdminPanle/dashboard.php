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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
    <div class="flex">
        <div class="w-[20%] ">
            <aside class="fixed z-10 inset-y-0 left-0 flex-wrap items-center justify-between w-full p-0 my-4 overflow-y-auto transition-all duration-200 -translate-x-full bg-[#f8f9fa] border-0 shadow-lg xl:ml-4 dark:bg-[#e0e0e0] ease-soft-in-out z-990 max-w-64 rounded-2xl xl:translate-x-0 xl:bg-transparent">
                <div class="h-20">
                    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href="" target="_blank">
                        <img src="https://i.ibb.co.com/5Y53PdM/shohoz-logo-new.png" class="h-full max-w-full transition-all duration-200 ease-soft-in-out max-h-9 ml-4 dark:inline-block" alt="main_logo">
                    </a>
                    <div class="text-center">
                        <p class="font-semibold transition-all text-lg ml-[-5px] duration-200 text-[#3a3a3a]">Imam Hossain</p>
                    </div>
                    <hr class="mx-6 mt-3">
                </div>
                <div class="mt-20 px-6">
                    <ul class="w-full">
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-gauge w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Dashboard</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-bus w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Buses</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-road w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Routes</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-users w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Customers</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-ticket w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Booking</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-th w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Seats</a></li>
                        <li class="mb-4 rounded-lg hover:bg-[#e5e7eb] py-2 px-3"><a href=""><i class="fa-solid fa-circle-user w-8 h-8 bg-[#b1b1b1] shadow-xl rounded-lg text-center  pt-2"></i> Add New Admin</a></li>
                    </ul>
                </div>
            </aside>
        </div>
        
         <div class="w-[80%] ">
            <!-- Navbar Start -->
            <div class="px-5 flex  items-center h-[90px] shadow-md"> 
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-filter-left sidenav-block h-8 w-8"><path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"></path></svg>
                </button>
                <form action="" class="mx-5">
                    <div class="flex flex-wrap items-stretch w-full relative">
                        <input type="text" name="searchInp" id="searchInp" placeholder="Search" class="flex-shrink flex-grow max-w-full leading-5 relative text-sm py-2 px-4 ltr:rounded-l rtl:rounded-r text-gray-800 bg-gray-100 overflow-x-auto focus:outline-none border border-gray-100 focus:border-gray-200 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600">
                        <div class="flex -mr-px">
                            <button class="flex items-center py-2 rounded-r-lg px-4 ltr:-ml-1 rtl:-mr-1 ltr:rounded-r rtl:rounded-l leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-search"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path></svg>
                            </button>
                        </div>
                    </div>
                </form>
                    <ul class="flex gap-2 ml-[40%] items-center mt-2">
                        <li class="relative ">
                            <div class="relative">
                                <div class="relative w-8 py-3">
                                    <input type="checkbox" name="lightdark" id="labele" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white dark:bg-gray-700 border-2 dark:border-gray-700 appearance-none cursor-pointer" value="1">
                                    <label for="labele" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 dark:bg-gray-900 cursor-pointer"></label>
                                </div>
                            </div>
                        </li>
                        <li class="relative">
                            <button class="py-3 px-4 ml-2 flex text-sm rounded-full focus:outline-none" id="user-messages" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                <div class="relative inline-block">
                                    <div class="relative inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-envelope w-6 h-6"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"></path>
                                        </svg>
                                        <span class="flex justify-center absolute -top-2 ml-5 ltr:-right-1 rtl:-left-1 text-center bg-pink-500 px-1 text-white rounded-full text-xs">
                                        <span class="align-self-center">3</span>
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <li class="relative">
                            <button class="py-3 px-4 flex text-sm rounded-full focus:outline-none" id="user-menu-button" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                <div class="relative inline-block">
                                    <div class="relative inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-bell w-6 h-6"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"></path></svg>
                                        <span class="flex justify-center absolute -top-2 ltr:-right-1 ml-4 rtl:-left-1 text-center bg-pink-500 px-1 text-white rounded-full text-xs"><span class="align-self-center">2</span></span>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 mt-[-9px] dark:focus:ring-gray-600" type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-center text-sm text-gray-900 dark:text-white">
                                <div>Imam Hossain</div>
                                <div class="font-medium truncate">imamhossain@gmail.com</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            </ul>
                            <div class="py-2">
                            <a href="../logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                            </div>
                        </div>

                    </ul>
            </div>
            <!-- Navbar End -->
            <div>
                
            </div>
         </div>
    </div>
    </section>
    
</body>
</html>
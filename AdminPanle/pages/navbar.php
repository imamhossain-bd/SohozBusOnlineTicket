<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
            <!-- Navbar Start -->
            <div class="fixed px-5 bg-white flex w-[80%] items-center h-[90px] shadow-md"> 
                <button class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="2em" height="2em" fill="currentColor" class="bi bi-filter-left sidenav-block h-8 w-8"><path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"></path></svg>
                </button>
                <form action="" class="mx-5 ">
                    <div class="flex flex-wrap items-stretch w-full relative">
                        <input type="text" name="searchInp" id="searchInp" placeholder="Search" class="flex-shrink flex-grow max-w-full leading-5 relative text-sm py-3 px-4 rounded-l-lg text-gray-800 bg-gray-100 overflow-x-auto focus:outline-none border border-gray-100 focus:border-gray-200 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600">
                        <div class="flex -mr-px">
                            <button class="flex items-center py-2 rounded-r-lg px-4 ltr:-ml-1 rtl:-mr-1 ltr:rounded-r rtl:rounded-l leading-5 text-gray-100 bg-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-search"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path></svg>
                            </button>
                        </div>
                    </div>
                </form>
                    <ul class="flex gap-2 ml-[50%] items-center mt-2">
                        <li class="relative ">
                            <div class="relative">
                                <div class="relative w-8 py-3">
                                    <input type="checkbox" name="lightdark" id="labele" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white dark:bg-gray-700 border-2 dark:border-gray-700 appearance-none cursor-pointer" value="1">
                                    <label for="labele" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 dark:bg-gray-900 cursor-pointer"></label>
                                </div>
                            </div>
                        </li>
                        <li class="relative">
                            <div class="relative font-sans w-max max-auto">
                                <button  id="dropdownToggleMessage" class="py-3 px-4 ml-2 flex text-sm rounded-full focus:outline-none" id="user-messages" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                    <div class="relative inline-block">
                                        <div class="relative inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg>
                                            <span class="flex justify-center absolute -top-2 ml-5 ltr:-right-1 rtl:-left-1 text-center bg-pink-500 px-[6px] py-[1px] text-white rounded-full text-xs">
                                            <span class="align-self-center">3</span>
                                            </span>
                                        </div>
                                    </div>
                                </button>

                                <div id="dropdownMenuMessage" class='hidden absolute right-0 shadow-lg bg-white py-4 z-[1000] min-w-full rounded-lg w-[300px] max-h-[300px] overflow-auto mt-2'>
                                    <div class="flex items-center justify-between px-4 mb-4">
                                    <p class="text-xs text-blue-600 cursor-pointer">Clear all</p>
                                    <p class="text-xs text-blue-600 cursor-pointer">Mark as read</p>
                                    </div>

                                    <ul class="divide-y">
                                    <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                        <div class="ml-6">
                                        <h3 class="text-sm text-[#333] font-semibold">Your have a new message from Yin</h3>
                                        <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                            the motion school.</p>
                                        <p class="text-xs text-blue-600 leading-3 mt-2">10 minutes ago</p>
                                        </div>
                                    </li>

                                    <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                        <div class="ml-6">
                                        <h3 class="text-sm text-[#333] font-semibold">Your have a new message from Haper</h3>
                                        <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                            the motion school.</p>
                                        <p class="text-xs text-blue-600 leading-3 mt-2">2 hours ago</p>
                                        </div>
                                    </li>

                                    <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                        <div class="ml-6">
                                        <h3 class="text-sm text-[#333] font-semibold">Your have a new message from San</h3>
                                        <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                            the motion school.</p>
                                        <p class="text-xs text-blue-600 leading-3 mt-2">1 day ago</p>
                                        </div>
                                    </li>

                                    <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                        <div class="ml-6">
                                        <h3 class="text-base text-[#333] font-semibold">Your have a new message from Seeba</h3>
                                        <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                            the motion school.</p>
                                        <p class="text-xs text-blue-600 leading-3 mt-2">30 minutes ago</p>
                                        </div>
                                    </li>
                                    </ul>
                                    <p class="text-xs px-4 mt-6 mb-4 inline-block text-blue-600 cursor-pointer">View all Notifications</p>
                                </div>
                            </div>
                        </li>
                        <li class="relative">
                        <div class="relative font-[sans-serif] w-max mx-auto">
                            <button type="button" id="dropdownToggle"
                                class="w-12 h-12 flex items-center justify-center rounded-full border-2 text-white border-none outline-none  ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22px" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416l400 0c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4l0-25.4c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112l0 25.4c0 47.9 13.9 94.6 39.7 134.6L72.3 368C98.1 328 112 281.3 112 233.4l0-25.4c0-61.9 50.1-112 112-112zm64 352l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/></svg>
                                <span class="flex justify-center absolute mt-[-1.6rem] ml-5 ltr:-right-1 rtl:-left-1 text-center bg-pink-500 px-[6px] py-[1px] text-white rounded-full text-xs">
                                <span class="align-self-center">3</span>
                                </span>
                            </button>

                            <div id="dropdownMenu" class='hidden absolute right-0 shadow-lg bg-white py-4 z-[1000] min-w-full rounded-lg w-[300px] max-h-[300px] overflow-auto mt-2'>
                                <div class="flex items-center justify-between px-4 mb-4">
                                <p class="text-xs text-blue-600 cursor-pointer">Clear all</p>
                                <p class="text-xs text-blue-600 cursor-pointer">Mark as read</p>
                                </div>

                                <ul class="divide-y">
                                <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                    <img src="https://readymadeui.com/profile_2.webp" class="w-12 h-12 rounded-full shrink-0" />

                                    <div class="ml-6">
                                    <h3 class="text-sm text-[#333] font-semibold">Your have a new message from Yin</h3>
                                    <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                        the motion school.</p>
                                    <p class="text-xs text-blue-600 leading-3 mt-2">10 minutes ago</p>
                                    </div>
                                </li>

                                <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                    <img src="https://readymadeui.com/team-2.webp" class="w-12 h-12 rounded-full shrink-0" />

                                    <div class="ml-6">
                                    <h3 class="text-sm text-[#333] font-semibold">Your have a new message from Haper</h3>
                                    <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                        the motion school.</p>
                                    <p class="text-xs text-blue-600 leading-3 mt-2">2 hours ago</p>
                                    </div>
                                </li>

                                <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                    <img src="https://readymadeui.com/team-3.webp" class="w-12 h-12 rounded-full shrink-0" />

                                    <div class="ml-6">
                                    <h3 class="text-sm text-[#333] font-semibold">Your have a new message from San</h3>
                                    <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                        the motion school.</p>
                                    <p class="text-xs text-blue-600 leading-3 mt-2">1 day ago</p>
                                    </div>
                                </li>

                                <li class='p-4 flex items-center hover:bg-gray-50 cursor-pointer'>
                                    <img src="https://readymadeui.com/team-4.webp" class="w-12 h-12 rounded-full shrink-0" />

                                    <div class="ml-6">
                                    <h3 class="text-sm text-[#333] font-semibold">Your have a new message from Seeba</h3>
                                    <p class="text-xs text-gray-500 mt-2">Hello there, check this new items in from the your may interested from
                                        the motion school.</p>
                                    <p class="text-xs text-blue-600 leading-3 mt-2">30 minutes ago</p>
                                    </div>
                                </li>
                                </ul>
                                <p class="text-xs px-4 mt-6 mb-4 inline-block text-blue-600 cursor-pointer">View all Notifications</p>
                            </div>
                        </div>
                        </li>
                        <div>
                            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 ml-5 mt-[-9px] dark:focus:ring-gray-600" type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatar" class=" absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-[240px] dark:bg-gray-700 dark:divide-gray-600 ">
                                <div class="px-4 py-3 text-center text-sm text-gray-900 dark:text-white">
                                    <div class="font-medium">Imam Hossain</div>
                                    <div class="font-medium truncate">imamhossain@gmail.com</div>
                                </div>
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-[#2e2e2e]">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-[#2e2e2e]">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-[#2e2e2e]">Earnings</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <a href="../logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-[#2e2e2e]">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </ul>
            </div>
            <!-- Navbar End -->
    </section>

    <script>
        let dropdownToggle = document.getElementById('dropdownToggle');
        let dropdownMenu = document.getElementById('dropdownMenu');

        function handleClick() {
            if (dropdownMenu.className.includes('block')) {
                dropdownMenu.classList.add('hidden')
                dropdownMenu.classList.remove('block')
            } else {
                dropdownMenu.classList.add('block')
                dropdownMenu.classList.remove('hidden')
            }
        }

        dropdownToggle.addEventListener('click', handleClick);

        let dropdownToggleMessage = document.getElementById('dropdownToggleMessage');
        let dropdownMenuMessage = document.getElementById('dropdownMenuMessage');

        function handleClickMess() {
            if (dropdownMenuMessage.className.includes('block')) {
                dropdownMenuMessage.classList.add('hidden')
                dropdownMenuMessage.classList.remove('block')
            } else {
                dropdownMenuMessage.classList.add('block')
                dropdownMenuMessage.classList.remove('hidden')
            }
        }

        dropdownToggleMessage.addEventListener('click', handleClickMess);
    </script>


</body>
</html>
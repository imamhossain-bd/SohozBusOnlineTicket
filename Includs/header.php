<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/d69002f9fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <div>
            <nav class="bg-white h-[75px] w-full">
                <div class="px-40 flex justify-between items-center gap-5 pt-5">
                    <div class="w-28">
                        <a href="../main.php"><img src="https://i.ibb.co.com/5Y53PdM/shohoz-logo-new.png" alt=""></a>
                    </div>
                    <div>
                        <ul class="flex gap-5">
                            <li class=" px-4 py-1 text-base font-semibold border-2 border-green-700 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-solid fa-bus"></i> BUS</a></li>
                            <li class=" px-4 py-1 text-base font-semibold border-transparent border-2 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-solid fa-jet-fighter-up"></i> Air</a></li>
                            <li class=" px-4 py-1 text-base font-semibold border-transparent border-2 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-solid fa-train-subway"></i> Train</a></li>
                            <li class=" px-4 py-1 text-base font-semibold border-transparent border-2 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-solid fa-ship"></i> Launch</a></li>
                            <li class=" px-4 py-1 text-base font-semibold border-transparent border-2 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-regular fa-calendar"></i> Event</a></li>
                            <div class="cursor-pointer">
                                <li class=" px-4 py-1 text-base font-semibold border-transparent border-2 hover:border-green-700 hover:text-[#01652c] rounded-xl"><a href="#"><i class="fa-brands fa-slack"></i> Park</a></li>
                                <span class="text-[10px] bg-red-600 text-white font-semibold py-[1px] px-1 rounded absolute top-[16px] ml-16 uppercase">Beta</span>
                            </div>
                            
                        </ul>
                    </div>
                    <div class="flex items-center gap-5">
                        <button class="bg-[#f88922] px-4 py-2 rounded-full text-white text-sm font-medium"><a href=""><i class="fa-solid fa-phone"></i>  16374</a></button>
                        <div>
                            <button class="text-base font-semibold px-3 py-[2px] border-transparent border-2 hover:border-green-700 rounded-full"><a href="login.php">Login</a></button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
</body>
</html>
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

</style>
<body>
    <section>
        <div class="bg-[url('https://i.ibb.co/Jj5HQ4K/hero-illustration.webp')] bg-cover bg-center h-[19rem] pt-36 px-[10rem]">
            <div class="bg-[#fffffff2] mx-sm:p-2 max-w-full mx-auto relative w-full rounded-3xl h-[135px]">
                <div class="flex ml-7 pt-5 items-center space-x-4 mb-4">
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
                    <div class="flex gap-4 px-6">
                        <label for="fromcity" class="border-2 rounded-lg cursor-pointer border-gray-300 w-full h-14">
                            <div class="flex gap-3">
                                <div class="mt-5 pl-2">
                                    <svg _ngcontent-ng-c827709370="" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path _ngcontent-ng-c827709370="" d="M13.9275 1.42945C14.2541 0.580255 13.4197 -0.254121 12.5705 0.0724892L0.673149 4.64842C-0.278128 5.01429 -0.202793 6.3845 0.782861 6.64385L5.69051 7.93537C5.87356 7.98353 6.01643 8.12647 6.06459 8.30945L7.35611 13.2171C7.61546 14.2028 8.98573 14.2782 9.35155 13.3268L13.9275 1.42945Z" fill="#079D49"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[#079d49] text-[11px] mt-1">FROM</p>
                                    <input type="text" name="DestinationFrom" id="DestinationFrom" placeholder="FROM" class="text-[15px] font-bold text-left text-[#333] outline-none border-0 bg-transparent cursor-pointer max-w-[100%]">
                                </div>
                            </div>
                        </label>
                        <div class="mt-[17px] cursor-pointer">
                            <svg _ngcontent-ng-c827709370="" xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 18 23" fill="none" class="hover:scale-110 transition-transform"><path _ngcontent-ng-c827709370="" d="M18 18.4L13.2 13.8L13.2 17.25L4.8 17.25C3.48 17.25 2.4 16.215 2.4 14.95C2.4 13.685 3.48 12.65 4.8 12.65L13.2 12.65C15.852 12.65 18 10.5915 18 8.05C18 5.5085 15.852 3.45 13.2 3.45L4.8 3.45L4.8 -5.7699e-07L1.70628e-06 4.6L4.8 9.2L4.8 5.75L13.2 5.75C14.52 5.75 15.6 6.785 15.6 8.05C15.6 9.315 14.52 10.35 13.2 10.35L4.8 10.35C2.148 10.35 1.36496e-06 12.4085 1.25386e-06 14.95C1.14277e-06 17.4915 2.148 19.55 4.8 19.55L13.2 19.55L13.2 23L18 18.4Z" fill="#0F2444"></path></svg>
                        </div>
                        <label for="fromcity" class="border-2 rounded-lg cursor-pointer border-gray-300 w-full h-14">
                            <div class="flex gap-3">
                                <div class="mt-5 pl-2">
                                    <svg _ngcontent-ng-c827709370="" xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none"><path _ngcontent-ng-c827709370="" d="M10.2426 10.414L9.42472 11.2364C8.82184 11.8379 8.03967 12.6114 7.07779 13.5569C6.47678 14.1478 5.52323 14.1477 4.92229 13.5567L2.51663 11.1776C2.21429 10.8757 1.96121 10.6212 1.75736 10.414C-0.585785 8.03165 -0.585785 4.16909 1.75736 1.78675C4.1005 -0.595584 7.89951 -0.595584 10.2426 1.78675C12.5858 4.16909 12.5858 8.03165 10.2426 10.414ZM7.72284 6.29282C7.72284 5.3254 6.95148 4.54115 6.00001 4.54115C5.04853 4.54115 4.27716 5.3254 4.27716 6.29282C4.27716 7.26021 5.04853 8.04447 6.00001 8.04447C6.95148 8.04447 7.72284 7.26021 7.72284 6.29282Z" fill="#079D49"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[#079d49] text-[11px] mt-1">TO</p>
                                    <input type="text" name="DestinationTo" id="DestinationTo" placeholder="TO" class="text-[15px] font-bold text-left text-[#333] outline-none border-0 bg-transparent cursor-pointer max-w-[100%]">
                                </div>
                            </div>
                        </label>
                        <div class="border-2 rounded-lg cursor-pointer border-gray-300 w-full h-14">
                            <div class="flex px-2">
                                <div class=" h-[54px] rounded-lg w-[50%]">
                                    <label for="fromcity" class="">
                                        <p class="text-[#079d49] text-[11px] mt-1">Journey Date</p>
                                        <input type="text" name="PickDate" id="" placeholder="Pick a date" class="text-[15px] font-bold text-left text-[#333] outline-none border-0 bg-transparent cursor-pointer max-w-[100%]">
                                    </label>
                                </div>
                                <div class="h-[54px] rounded-lg w-[50%]">
                                    <label for="fromcity">
                                        <p class="text-[#079d49] text-[11px] mt-1"></p>
                                        <button class="text-orange-500 text-[10px] mt-4 font-medium">+ ADD RETURN TRIP</button>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button href="" class="px-5 py-4 rounded-lg text-white font-semibold bg-[#0dac53] ">SEARCH</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
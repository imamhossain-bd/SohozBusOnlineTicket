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
<body>
    <section>
        <div class="bg-[url('https://i.ibb.co/Jj5HQ4K/hero-illustration.webp')] bg-cover bg-center h-[19rem] pt-36 px-[10rem]">
            <div class="bg-[#fffffff2] mx-sm:p-2 max-w-full mx-auto relative w-full rounded-3xl h-[126px]">
                <div class="custom-trip-type-radio-container ng-star-inserted flex gap-10 px-8 pt-4">
                    <button type="button" class="text-lg font-semibold btn-trip-type radio-selected">
                        <span class="radio-icon"><i class="fa-regular fa-circle-dot"></i></span> One Way
                    </button>
                    <button type="button" class="text-lg font-semibold btn-trip-type radio-selected">
                        <span class="radio-icon"><i class="fa-regular fa-circle-dot"></i></span> Round Way
                    </button>
                </div>
                <form action="" class="input-container flex flex-wrap lg:flex-nowrap justify-between items-center max-lg:flex-col pt-2 ng-pristine ng-invalid ng-touched">
                    <label for="fromcity" class="fromcity-input input-div relative station-filter w-full">
                        <div class="from-to-container relative w-full h-full flex justify-start items-center">
                            <div class="svg-container">
                            <svg _ngcontent-ng-c827709370="" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path _ngcontent-ng-c827709370="" d="M13.9275 1.42945C14.2541 0.580255 13.4197 -0.254121 12.5705 0.0724892L0.673149 4.64842C-0.278128 5.01429 -0.202793 6.3845 0.782861 6.64385L5.69051 7.93537C5.87356 7.98353 6.01643 8.12647 6.06459 8.30945L7.35611 13.2171C7.61546 14.2028 8.98573 14.2782 9.35155 13.3268L13.9275 1.42945Z" fill="#079D49"></path></svg>
                            </div>
                        </div>
                        <div class="input-section relative w-[100%] h-[100%] flex-col justify-evenly">
                            <p class="text-[10px] font-normal text-left text-[#079d49]">From</p>
                            <input type="text" name="fromcity" id="fromcity" autocomplete="off" placeholder="From" class="font-bold leading-5 text-left text-[#333] outline-0 border-2 bg-transparent max-w-100%">
                        </div>
                    </label>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NUSACRAFT AR</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link
            rel="stylesheet"
            href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#EDECED]">
        <div class="h-screen">
            <a href="{{ route('nusacraft') }}" class="bg-white p-2 shadow-lg fixed z-50 top-6 left-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 19.9201L8.47997 13.4001C7.70997 12.6301 7.70997 11.3701 8.47997 10.6001L15 4.08008" stroke="#111111" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
            </a>
            <img src="/kc.png" class="w-full">
            <div class="bg-white shadow-2xl pb-11 flex-1 rounded-t-3xl">
                <h1 class="font-medium text-lg px-6 py-3 border-b-2 border-slate-200">
                    Suvenir Kaos Cepot
                </h1>
                <p class="text-justify text-sm px-6 pt-3">
                    Temukan pengalaman baru dalam memakai kaos dengan teknologi augmented reality! Kaos ini menampilkan desain unik Wayang Cepot yang hidup saat dilihat melalui aplikasi AR kami.
                </p>
                <div class="flex px-3 text-sm flex-col bg-[#EDECED] text-black rounded-lg py-2 mx-6 my-2 justify-center items-center">
                    <p class="">
                        <span class="font-medium">Desain: </span> Wayang Cepot Jawa Barat
                    </p>
                    <p class="">
                        <span class="font-medium">Bahan: </span> Cotton Combed 20s
                    </p>
                </div>
                <div class="flex justify-between gap-4 w-full px-6 pt-2 font-medium">
                    <p class="bg-[#284067] w-full p-1 flex justify-center items-center h-[27px] text-sm rounded-lg text-white">
                        S
                    </p>
                    <p class="bg-white border-[#284067] border-[1px] w-full p-1 flex justify-center items-center h-[27px] text-sm rounded-lg">
                        M
                    </p>
                    <p class="bg-white border-[#284067] border-[1px] w-full p-1 flex justify-center items-center h-[27px] text-sm rounded-lg">
                        XL
                    </p>
                    <p class="bg-white border-[#284067] border-[1px] w-full p-1 flex justify-center items-center h-[27px] text-sm rounded-lg">
                        XXL
                    </p>
                </div>
                <div class="mx-6 mt-4 py-2 flex justify-center items-center bg-[#284067] rounded-lg text-white font-bo">Pesan</div>
            </div>
        </div>
    </body>
</html>
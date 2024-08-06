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
    <body class="bg-[#284067]">
        <div class="flex items-center fixed justify-between w-full">
            <div class="m-6 flex gap-3 items-center">
                <img src="/pp.png" alt="greating" class="w-12 h-12 rounded-full">
                <div class="">
                    <h1 class="text-white text-sm">Selamat Datang,</h1>
                    <h1 class="text-white text-lg font-medium">Deswal Waskito</h1>
                </div>
            </div>
            <div class="bg-[rgba(255,255,255,0.20)] rounded-full p-2 w-12 h-12 mr-6 items-center flex justify-center ">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewbox="0 0 24 24"
                    fill="none">
                    <path
                        d="M19.3399 14.4899L18.3399 12.8299C18.1299 12.4599 17.9399 11.7599 17.9399 11.3499V8.81991C17.9387 7.70395 17.6216 6.61113 17.0252 5.66789C16.4288 4.72465 15.5776 3.96953 14.5699 3.48992C14.3128 3.03326 13.9376 2.65406 13.4838 2.39195C13.0299 2.12984 12.514 1.99445 11.9899 1.99992C10.8999 1.99992 9.91994 2.58992 9.39994 3.51992C7.44994 4.48992 6.09994 6.49992 6.09994 8.81991V11.3499C6.09994 11.7599 5.90994 12.4599 5.69994 12.8199L4.68994 14.4899C4.28994 15.1599 4.19994 15.8999 4.44994 16.5799C4.68994 17.2499 5.25994 17.7699 5.99994 18.0199C7.93994 18.6799 9.97994 18.9999 12.0199 18.9999C14.0599 18.9999 16.0999 18.6799 18.0399 18.0299C18.7399 17.7999 19.2799 17.2699 19.5399 16.5799C19.7999 15.8899 19.7299 15.1299 19.3399 14.4899ZM14.8299 20.0099C14.6196 20.5921 14.2352 21.0954 13.7289 21.4514C13.2226 21.8074 12.6189 21.9989 11.9999 21.9999C11.2099 21.9999 10.4299 21.6799 9.87994 21.1099C9.55994 20.8099 9.31994 20.4099 9.17994 19.9999C9.30994 20.0199 9.43994 20.0299 9.57994 20.0499C9.80994 20.0799 10.0499 20.1099 10.2899 20.1299C10.8599 20.1799 11.4399 20.2099 12.0199 20.2099C12.5899 20.2099 13.1599 20.1799 13.7199 20.1299C13.9299 20.1099 14.1399 20.0999 14.3399 20.0699L14.8299 20.0099Z"
                        fill="white"/>
                </svg>
            </div>
        </div>

        <div class="fixed inset-x-0 h-full top-24 bg-white overflow-hidden rounded-3xl px-6 pt-6">
            <img src="/banner.png" alt="banner" class="w-full">
            <h1 class="text-md font-medium mt-6 mb-4">Produk Nusacraft</h1>
            <div class="h-full overflow-y-scroll pb-[400px]">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('detailproduct') }}" class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/kc.png" alt="kaos cepot" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Kaos Cepot
                        </p>
                    </a>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/gc.png" alt="ganci cepot" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Ganci Cepot
                        </p>
                    </div>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/gb.png" alt="ganci barong" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Ganci Barong
                        </p>
                    </div>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/tb.png" alt="totebag barong" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Totebag Barong
                        </p>
                    </div>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/tc.png" alt="kaos cepot" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Tumblr Cepot
                        </p>
                    </div>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/kb.png" alt="kaos cepot" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Kaos Barong
                        </p>
                    </div>
                    <div class="aspect-square flex flex-col justify-center items-center bg-white rounded-2xl shadow-lg">
                        <img src="/t.png" alt="kaos cepot" class="w-full h-full object-cover">
                        <p class="text-sm font-medium py-1">
                            Topi Cepot
                        </p>
                    </div>                    
                    <!-- Tambahkan gambar tambahan di sini -->
                </div>
            </div>
        </div>
        @include('/layouts/navbar')
    </body>
</html>
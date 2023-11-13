<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proculture AR</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <!-- Home Section Start -->
    <header class="fixed z-10 w-full mt-0 bg-white ">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl mx-auto md:items-center md:justify-between md:flex-row">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="flex items-center">
                    <img src="/logo.png" class="h-6 mr-3 sm:h-9" alt="Proculture Logo" />
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-start md:flex-row">
                <a class="px-4 py-2 mt-2 text-2xl font-semibold bg-transparent rounded-lg hover:text-slate-400  md:mt-0 text-[#5272EE] lg:ml-4  focus:text-gray-900  focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#home">Home</a>
                <a class="px-4 py-2 mt-2 text-2xl font-semibold bg-transparent rounded-lg hover:text-slate-400  md:mt-0 text-[#5272EE] lg:ml-4  focus:text-gray-900  focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#product">Product</a>
                <a class="px-4 py-2 mt-2 text-2xl font-semibold bg-transparent rounded-lg hover:text-slate-400  md:mt-0 text-[#5272EE] lg:ml-4  focus:text-gray-900  focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#how">How it works</a>
                <a class="px-4 py-2 mt-2 text-2xl font-semibold bg-transparent rounded-lg hover:text-slate-400  md:mt-0 text-[#5272EE] lg:ml-4  focus:text-gray-900  focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#team">Team</a>
                <a class="px-4 py-2 mt-2 text-2xl font-semibold bg-transparent rounded-lg hover:text-slate-400  md:mt-0 text-[#5272EE] lg:ml-4  focus:text-gray-900  focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#faq">FAQ</a>
            </nav>
        </div>

    </header>
    <!-- Start block -->
    <section class="bg-white dark:bg-[#E9EEFF] " id="home">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28 justify-center">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl sm:text-left md:text-left ld:text-left font-extrabold leading-none tracking-tight md:text-5xl xl:text-7xl dark:text-[#5272EE] text-center">PROCULTURE</h1>
                <h2 class="max-w-2xl mb-4 text-xl sm:text-left md:text-left ld:text-left font-extrabold leading-none tracking-tight md:text-5xl xl:text-xl dark:text-[#5272EE]  text-center">PRO KEBUDAYAN PRO TEKNOLOGI</h2>
                <p class=" font-light text-gray-500 lg:mb-8 md:text-xs lg:text-base sm:text-left md:text-left ld:text-left dark:text-gray-400 text-xs text-center">Kaos kualitas tinggi dengan teknologi terkini <br> augmented reality</p>
            </div>
            <div class="mt-0 lg:col-span-5 lg:flex">
                <img src="/kaos.png" alt="hero image" width="900">
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Product Start -->
    <!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->
    <div class="flex mx-auto flex-col items-center justify-center px-4 py-8" id="product" >
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-[#5272EE]">Our Products</h2>
        <!-- product list -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8 justify-center">
            @foreach ($products as $product)
            <!-- with image -->
            <div class="shadow-lg">
                <a href="{{ route('ar.show', $product) }}" class="flex flex-col overflow-hidden gap-2 duration-200 group">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover bg-gray-200 group-hover:bg-gray-300 duration-200">
                    <div class="bg-white p-4 flex flex-col gap-2">
                        <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                        <p class="text-gray-500">{{ strlen($product->description) > 100 ? substr($product->description, 0, 100) . '...' : $product->description }}</p>
                        <div class="absolute text-blue-600 flex justify-center gap-1 group-hover:gap-2 duration-200 py-2 px-4 rounded group-hover:text-white group-hover:bg-blue-600">
                            View in AR
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </div>
                   </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Product End -->

  
    <section class="bg-white dark:bg-[#E9EEFF]" id="how">
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
            <div class="col-span-2 mb-8">
                <img src="/ar.png" alt="Proculture Ar">
            </div>
            <div class="col-span-2 space-y-8 md:grid  md:gap-12 md:space-y-0">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-[#5272EE]">Augmented Reality Fitur</h2>
                    <!-- List -->
                    <ol class="pt-8 space-y-5 border-gray-200 my-7 dark:border-gray-700 list-decimal">
                        <li class="flex space-x-3">
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-[#5272EE]">1. Pilih produk kaos yang telah kamu beli</span>
                        </li>
                        <li class="flex space-x-3">

                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-[#5272EE]">2. Klik tombol "View in Ar"</span>
                        </li>
                        <li class="flex space-x-3">

                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-[#5272EE]">3. Arahkan kamera pada gambar kecil di kiri bawah kaos</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-[#5272EE]">4. Model 3d dan voice over deskripsi akan muncul</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-[#5272EE]">5.  Klik "Learn More" untuk melihat deskripsi lebih lengkap</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- ====== Cards Section Start -->
    <div class="flex items-center justify-center min-h-screen bg-white py-10" id="team">
        <div class="flex flex-col">
            <div class="flex flex-col mt-8">
                <!-- Meet the Team -->
                <div class="container max-w-7xl px-4">
                    <!-- Section Header -->
                    <div class="flex flex-wrap justify-center text-center mb-10">
                        <div class="w-full lg:w-6/12 px-4">
                            <!-- Header -->
                            <h1 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-[#5272EE]">
                                Proculture Team
                            </h1>
                        </div>
                    </div>

                    <!-- Team Members -->
                    <div class="flex flex-wrap">
                        <!-- Member #1 -->
                        <div class="w-full md:w-6/12 lg:w-1/5  mb-6 px-6 sm:px-6 lg:px-4">
                            <div class="flex flex-col">
                                <!-- Avatar -->
                                <a href="#" class="mx-auto">
                                    <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="/Deswal.png">
                                </a>
                                <!-- Details -->
                                <div class="text-center mt-6">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-xl font-bold mb-1">
                                        Deswal Waskito
                                    </h1>
                                    <!-- Title -->
                                    <div class="text-gray-700 font-light mb-2">
                                        Chief Executive Officer
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member #2 -->
                        <div class="w-full md:w-6/12 lg:w-1/5  mb-6 px-6 sm:px-6 lg:px-4">
                            <div class="flex flex-col">
                                <!-- Avatar -->
                                <a href="#" class="mx-auto">
                                    <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="/Hilda.png">
                                </a>

                                <!-- Details -->
                                <div class="text-center mt-6">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-xl font-bold mb-1">
                                        Hildatul Wardah
                                    </h1>

                                    <!-- Title -->
                                    <div class="text-gray-700 font-light mb-2">
                                        Chief Technology Officer
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member #3 -->
                        <div class="w-full md:w-6/12 lg:w-1/5  mb-6 px-6 sm:px-6 lg:px-4">
                            <div class="flex flex-col">
                                <!-- Avatar -->
                                <a href="#" class="mx-auto">
                                    <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="/Ilhan.png">
                                </a>

                                <!-- Details -->
                                <div class="text-center mt-6">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-xl font-bold mb-1">
                                        Muhammad Ilhan Mansiz
                                    </h1>

                                    <!-- Title -->
                                    <div class="text-gray-700 font-light mb-2">
                                        Chief Creative Officer
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member #4 -->
                        <div class="w-full md:w-6/12 lg:w-1/5  mb-6 px-6 sm:px-6 lg:px-4">
                            <div class="flex flex-col">
                                <!-- Avatar -->
                                <a href="#" class="mx-auto">
                                    <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="/Silva.png">
                                </a>

                                <!-- Details -->
                                <div class="text-center mt-6">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-xl font-bold mb-1">
                                        Safira Silvayani
                                    </h1>

                                    <!-- Title -->
                                    <div class="text-gray-700 font-light mb-2">
                                        Chief Marketing Officer
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Member #5 -->
                        <div class="w-full md:w-6/12 lg:w-1/5 mb-6 px-6 sm:px-6 lg:px-4">
                            <div class="flex flex-col">
                                <!-- Avatar -->
                                <a href="#" class="mx-auto">
                                    <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="/Fitri.png">
                                </a>

                                <!-- Details -->
                                <div class="text-center mt-6">
                                    <!-- Name -->
                                    <h1 class="text-gray-900 text-xl font-bold mb-1">
                                        Fitri Maulidiyah
                                    </h1>
                                    <!-- Title -->
                                    <div class="text-gray-700 font-light mb-2">
                                        Chief Marketing Officer
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Cards Section End -->
    <!-- Faq Start -->
    <div class="relative w-full bg-white px-6 pt-10 pb-8 my-4 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10" id="faq">
        <div class="mx-auto px-5">
            <div class="flex flex-col items-center">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-[#5272EE]">FAQ</h2>
                <p class="mt-3 text-lg text-neutral-500 md:text-xl">Frequenty asked questions

                </p>
            </div>
            <div class="mx-auto mt-8 grid max-w-xl divide-y divide-neutral-200">
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span> Apa itu augmented reality?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600 text-justify">Augmented Reality atau AR  adalah teknologi yang memperoleh penggabungan secara real-time terhadap digital konten yang dibuat oleh komputer dengan dunia nyata.
                            Augmented Reality dapat membuat pengguna melihat objek maya 2D atau 3D yang diproyeksikan terhadap dunia nyata.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span> Bahan apa yang digunakan untuk kaos?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Produk Proculture menyediakan bahan kain cotton combed 24s dan 20s.
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span> Jenis sablon yang digunakan?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Sablon yang digunakan adalah sablon dengan metode DTF (Digital Transfer Film).
                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span> Dapat memesan lewat apa saja?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Produk Proculture dapat dipesan melalui Shopee, Tokopedia, Instagram dan Whatsapp.                        </p>
                    </details>
                </div>
                <div class="py-5">
                    <details class="group">
                        <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                            <span> Apakah fitur augmented reality Proculture membutuhkan aplikasi tambahan?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="group-open:animate-fadeIn mt-3 text-neutral-600">Fitur Augmented Reality pada produk Proculture tidak membutuhkan aplikasi tambahan, cukup buka website proculture.store untuk menggunakan fitur tersebut.
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq End -->
    <!-- ====== Footer Section Start -->
    <footer class="text-center sm:text-left justify-center px-10 relative bg-black pb-10 pt-20 dark:bg-dark lg:pb-20 lg:pt-[120px]">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap">

                <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                    <div class="mb-10 w-full">
                        <a href="javascript:void(0)" class="mb-6 inline-block max-w-[160px]">
                            <img src="/proculture.png" alt="logo" class="max-w-full" />
                            <img src="/logo.png" alt="logo Proculture" class="hidden max-w-full dark:bg-white" />
                        </a>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 lg:w-1/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
                            Category
                        </h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    How it Works
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    Team
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full  sm:w-1/2 lg:w-1/12">
                    <div class="border-r border-gray-200 dark:border-gray-700 h-full"></div>
                </div>
                <div class="w-full px-4 sm:w-1/2 lg:w-2/12">

                </div>
                <div class="w-full lg:w-2/12">
                    <div class="mb-3 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
                            Contact Us
                        </h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    proculture_id
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">

                                    proculturecompany
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    procultureshop
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-white">
                                    procultureid@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
                            Feedback
                        </h4>
                        <p class="text-white">Give us feedback to grow better</p>
                        <input type="button" value="">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <span class="absolute bottom-0 left-0 z-[-1]">
                <svg width="217" height="229" viewBox="0 0 217 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z" fill="url(#paint0_linear_1179_5)" />
                    <defs>
                        <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5" y2="1.22829e-05" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3056D3" stop-opacity="0.08" />
                            <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </span>
            <span class="absolute right-10 top-10 z-[-1]">
                <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z" fill="url(#paint0_linear_1179_4)" />
                    <defs>
                        <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5" x2="75" y2="37.5" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#13C296" stop-opacity="0.31" />
                            <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </span>
        </div>
        <hr class="my-2 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <div class="text-center">
            <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2023 Copyright Proculture LLC. All rights reserved
            </span>

        </div>
    </footer>


    <!-- ====== Footer Section End -->

</body>

</html>

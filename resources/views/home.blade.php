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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full text-gray-700 bg-white">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
                <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">
                    Proculture <span class="text-blue-600">AR</span>
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/">Home</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">About</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</a>

            </nav>
        </div>
    </div>

    <main class="max-w-4xl mx-auto">
        <div class="flex flex-col items-center justify-center py-8">
            <h2 class="text-2xl font-bold">Our Products</h2>
            <!-- product list -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8 justify-center">
                @foreach ($products as $product)
                <!-- with image -->
                <div>
                    <a href="{{ route('ar.show', $product) }}" class="flex flex-col overflow-hidden gap-2 duration-200 group">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover bg-gray-200 group-hover:bg-gray-300 duration-200">
                        <div class="bg-white p-4 flex flex-col gap-2">
                            <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                            <p class="text-gray-500">{{ $product->description }}</p>
                            <div class="text-blue-600 flex justify-center gap-1 group-hover:gap-2 duration-200 py-2 px-4 rounded hover:text-white hover:bg-blue-600">
                                View in AR
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </div>
                            <a href="{{ route('ar.detail', $product) }}" class="text-gray-500 flex justify-center gap-1 group-hover:gap-2 duration-200 py-2 px-4 rounded border-2 border-gray-500/0 hover:border-gray-500 hover:border-2">
                                View Details
                            </a>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </main>


    <footer class="text-center py-8">
        <p class="text-gray-500 text-sm">
            &copy; {{ date('Y') }} Proculture AR. All rights reserved.
        </p>
    </footer>
</body>

</html>
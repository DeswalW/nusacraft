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
    <header>
        <div class="max-w-4xl mx-auto flex items-center justify-between py-8">
            <a href="/">
                <h1 class="text-4xl font-bold">
                    Proculture <span class="text-blue-600">AR</span>
                </h1>
            </a>
            <nav class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="text-lg mx-4 hover:text-blue-600 duration-200">Home</a>
                <a href="#" class="text-lg mx-4 hover:text-blue-600 duration-200">About</a>
                <a href="#" class="text-lg mx-4 hover:text-blue-600 duration-200">Contact</a>
            </nav>
        </div>
    </header>

    <main class="max-w-4xl mx-auto">
        <div class="flex flex-col items-center justify-center py-8">
            <h2 class="text-2xl font-bold">Our Products</h2>
            <!-- product list -->
            <div class="flex gap-4 mt-8 justify-center">
                @foreach ($products as $product)
                <!-- with image -->
                <a href="{{ route('ar.show', $product) }}" class="flex flex-col overflow-hidden rounded-lg hover:shadow-xl duration-200 shadow-lg group w-full md:w-1/3">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover bg-gray-200 group-hover:bg-gray-300 duration-200">
                    <div class="bg-white p-4 flex flex-col gap-2">
                        <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                        <p class="text-gray-500">{{ $product->description }}</p>
                        <div class="text-blue-600 flex justify-center gap-1 group-hover:gap-2 duration-200 py-2 px-4 rounded group-hover:text-white group-hover:bg-blue-600">View in AR
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>

                        </div>
                    </div>
                </a>
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
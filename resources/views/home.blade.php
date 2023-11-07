<x-home-layout>
    <div class="flex flex-col items-center justify-center py-8">
        <h2 class="text-2xl font-bold">Our Products</h2>
        <!-- product list -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8 justify-center">
            @foreach ($products as $product)
            <!-- with image -->
            <div class="shadow-lg">
                <a href="{{ route('ar.show', $product) }}" class="flex flex-col overflow-hidden gap-2 duration-200 group">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover bg-gray-200 group-hover:bg-gray-300 duration-200">
                    <div class="bg-white p-4 flex flex-col gap-2">
                        <h3 class="text-xl font-bold">{{ $product->name }}</h3>
                        <p class="text-gray-500">{{ $product->description }}</p>
                        <div class="text-blue-600 flex justify-center gap-1 group-hover:gap-2 duration-200 py-2 px-4 rounded group-hover:text-white group-hover:bg-blue-600">
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
</x-home-layout>

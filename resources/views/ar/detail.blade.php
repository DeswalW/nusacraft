<x-home-layout>
    <div class="flex flex-col items-center justify-center py-8 gap-10">
        <div class="flex flex-col gap-5 p-8">
            <h2 class="text-2xl font-bold self-center">
                {{ $product->name }}
            </h2>
            <div class="max-h-64 flex justify-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <p>
                {{ $product->description }}
            </p>
            <a href="{{ route('ar.show', $product) }}" class="text-blue-600 flex justify-center gap-1 hover:gap-2 duration-200 py-2 px-4 rounded hover:text-white hover:bg-blue-600">
                View in AR
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</x-home-layout>

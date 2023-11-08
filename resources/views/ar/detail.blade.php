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
        </div>
    </div>
</x-home-layout>

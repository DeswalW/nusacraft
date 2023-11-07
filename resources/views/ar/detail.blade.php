<x-home-layout>
    <div class="flex flex-col items-center justify-center py-8 gap-10">
        <h2 class="text-2xl font-bold">Our Products</h2>
        <!-- product list -->
        <div class="grid grid-cols-4 gap-2">
            <div class="flex justify-center align-center col-span-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="">
            </div>
            <div class="flex flex-col gap-4 col-span-2">
                <h3 class="text-xl font-bold">
                    {{ $product->name }}
                </h3>
                <p>
                    {{ $product->description }}
                </p>
            </div>
            <div class="col-span-4">
                <p>
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </div>
</x-home-layout>

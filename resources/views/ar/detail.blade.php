
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            {{ $product->name }}
        </title>
    </head>
    <body>
        <div class="mx-auto max-w-md sm:max-w-xl md:max-w-2xl lg:max-w-3xl">
            <!-- back button -->
            <a href="{{ route('proculture') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: rgb(0, 0, 0); text-decoration: none;">&larr; Back</a>
            <!-- content -->
            <div class="mt-12 px-6">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold flex justify-center">
                    {{ $product->name }}
                </h2>
                <div class="max-w-full flex mt-4">
                    <img src="{{ asset('storage/' . $product->image_description) }}" alt="{{ $product->name }}" class="rounded-xl sm:object-cover sm:h-auto sm:w-full md:object-cover lg:object-cover justify-center">
                </div>
                <p class="text-justify mt-4">
                    {!! nl2br($product->detail) !!}
                </p>
            </div>
        </div>
    </body>
    </html>
</body>
</html>

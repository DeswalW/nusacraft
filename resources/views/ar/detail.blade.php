
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
    <!-- back button -->
    <a href="{{ route('home') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: rgb(0, 0, 0); text-decoration: none;">&larr; Back</a>
    <div>
        <h2 class="text-2xl font-bold flex justify-center">
            {{ $product->name }}
        </h2>
    
        <div class="max-h-full flex justify-center">
            <img src="{{ asset('storage/' . $product->image_description) }}" alt="{{ $product->name }}">
        </div>
        <p class="text-justify">
            {{ $product->detail }}
        </p>
    </div>
</body>
</html>

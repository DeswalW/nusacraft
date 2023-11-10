
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
    <a href="{{ route('show') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: rgb(0, 0, 0); text-decoration: none;">&larr; Back</a>
    
    <h2 class="text-2xl font-bold self-center">
        {{ $product->name }}
    </h2>

    <div class="max-h-64 flex justify-center">
        <img src="{{ asset('storage/' . $product->image_description) }}" alt="{{ $product->name }}">
    </div>
    <p>
        {{ $product->detail }}
    </p>
</body>
</html>

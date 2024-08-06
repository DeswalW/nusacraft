
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            {{ $product->name }}
        </title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#EDECED]">
        <div class="mx-auto max-w-md sm:max-w-xl md:max-w-2xl lg:max-w-3xl">
            <!-- back button -->
            <div class="gap-4 bg-white fixed z-50 flex w-full px-6 py-4 justify-start items-center shadow-lg ">
                <a href="{{ route('nusacraft') }}" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15 19.9201L8.47997 13.4001C7.70997 12.6301 7.70997 11.3701 8.47997 10.6001L15 4.08008" stroke="#111111" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                </a>
                <h2 class="font-bold text-lg">
                    {{ $product->name }}
                </h2>
            </div>
            <!-- content -->
            <div class="px-6 pt-20 pb-6">
                <div class="max-w-full flex">
                    <img src="/detail.png" 
                    alt="{{ $product->name }}" class="rounded-xl sm:object-cover sm:h-auto sm:w-full md:object-cover lg:object-cover justify-center">
                </div>
                <p class="text-justify mt-4 text-sm">
                    {!! nl2br($product->detail) !!}
                </p>
            </div>
        </div>
</body>
</html>

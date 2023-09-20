<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        {{ $product->name }}
    </title>

    <script src="{{ asset('js/aframe-master.min.js') }}"></script>
    <script src="{{ asset('js/aframe-ar-nft.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .arjs-loader {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .arjs-loader div {
            text-align: center;
            font-size: 1.25em;
            color: white;
        }

        body {
            margin: 0;
            overflow: hidden;
        }

        #marker-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: red;
        }
    </style>

</head>

<body>

    <div id="marker-indicator"></div>
    <!-- back button -->
    <a href="{{ route('home') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: white; text-decoration: none;" class="absolute top-2 left-2 text-base text-white hover:text-gray-200 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Back</span>
    </a>
    <!-- product description show when the marker found -->
    <div id="description" style="display: none;" class="fixed bottom-2 w-11/12 px-4 py-2 mx-auto text-sm text-center text-white bg-gray-900 rounded-md flex flex-col gap-2">
        <p>{{ $product->description }}</p>
        @if ($product->link)
        <a href="{{ $product->link }}" target="_blank" class="px-4 py-2 text-sm text-center text-white bg-blue-500 rounded-md flex justify-center">
            Learn More
        </a>
        @endif
    </div>

    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <div style="width: 100%; height: 100%;">
        <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;">
            <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5" emitevents="true" id="nft">
                <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="{{ $product->scale }}" position="{{ $product->position }}" rotation="{{ $product->rotation }}" id="model"></a-entity>
            </a-nft>
            <a-entity camera></a-entity>
        </a-scene>
    </div>

    <script>
        const markerIndicator = document.querySelector('#marker-indicator');
        const audio = new Audio('{{ asset("storage/" . $product->music) }}');
        const marker = document.querySelector('#nft');
        const description = document.querySelector('#description');


        const setMarkerIndicatorColor = (color) => {
            markerIndicator.style.backgroundColor = color;
        };

        window.addEventListener('arjs-nft-loaded', (ev) => {
            setMarkerIndicatorColor('blue');
        });

        // when the camera is looking at the marker, play music from $product->music
        marker.addEventListener('markerFound', (ev) => {
            audio.play();
            setMarkerIndicatorColor('green');
            description.style.display = 'block';
        });

        // when the camera is not looking at the marker, pause music from $product->music
        marker.addEventListener('markerLost', (ev) => {
            audio.pause();
            setMarkerIndicatorColor('red');
            description.style.display = 'none';
        });
    </script>
</body>

</html>

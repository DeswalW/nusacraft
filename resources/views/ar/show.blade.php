<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $product->name }}
    </title>

    <script src="{{ asset('js/aframe-master.min.js') }}"></script>
    <script src="{{ asset('js/aframe-ar-nft.js') }}"></script>

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
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: red;
        }
    </style>

</head>

<body>

    <div id="marker-indicator"></div>
    <!-- back button -->
    <a href="{{ route('home') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 2.5em; color: white; text-decoration: none;">&larr; Back</a>
    <!-- product description show when the marker found -->
    <div style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 9999; font-size: 2.5em; color: white; text-decoration: none; display: none;" id="description">
        {{ $product->description }}
    </div>

    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;">
        <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5" emitevents="true" id="nft">
            <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="{{ $product->scale }}" position="{{ $product->position }}" rotation="{{ $product->rotation }}" id="model"></a-entity>
        </a-nft>
        <a-entity camera></a-entity>
    </a-scene>

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
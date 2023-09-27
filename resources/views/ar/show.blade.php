<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <a href="{{ route('home') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: white; text-decoration: none;">&larr; Back</a>
    <!-- product description show when the marker found -->
    <div id="description" style="position: fixed; bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 9999; background-color: rgba(0, 0, 0, 0.8); color: white; padding: 10px; display: none; width: 80%; text-align: center;">
        <p>{{ $product->description }}</p>
        @if ($product->link)
        <a href="{{ $product->link }}" target="_blank" style="color: white; text-decoration: none;">
            Learn More
        </a>
        @endif
    </div>

    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <div style="width: 100%; height: 100%;">
        <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false; sourceWidth: 1280; sourceHeight: 720; displayWidth: 1280; displayHeight: 720;">
            <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5" emitevents="true" id="nft">
                <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="{{ $product->scale }}" position="{{ $product->position }}" rotation="{{ $product->rotation }}" id="model" animation="property: rotation; to: {{ $product->model_rotation_x }} {{ $product->model_rotation_y + 360 }} {{ $product->model_rotation_z }}; loop: true; dur: 10000; easing: linear"></a-entity>
            </a-nft>
            <a-entity camera></a-entity>
        </a-scene>
    </div>

    <script>
        // set to full screen and landscape mode
        const aScene = document.querySelector('a-scene');
        if (aScene.requestFullscreen) {
            aScene.requestFullscreen();
        } else if (aScene.webkitRequestFullscreen) {
            aScene.webkitRequestFullscreen();
        }
        screen.orientation.lock('landscape');

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

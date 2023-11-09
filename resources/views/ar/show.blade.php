<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        {{ $product->name }}
    </title>

    <script src="{{ asset('js/aframe-master.min.js') }}"></script>
    <script src="{{ asset('js/aframe-ar-nft.js') }}"></script>
    <script type='text/javascript' src='https://raw.githack.com/AR-js-org/AR.js/master/three.js/build/ar-threex-location-only.js'></script>

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
                <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="{{ $product->scale }}" position="{{ $product->position }}" rotation="{{ $product->rotation }}" id="model" animation="property: rotation; to: {{ $product->model_rotation_x }} {{ $product->model_rotation_y + 360 }} {{ $product->model_rotation_z }}; loop: true; dur: 10000; easing: linear" material="shader: flat;"></a-entity>
            </a-nft>
            <a-entity camera id="camera" locationfinder rotation-reader look-controls>
            </a-entity>
        </a-scene>
    </div>

    <script>
        let location = null;
        AFRAME.registerComponent('locationfinder', {
            init() {
                navigator.geolocation.getCurrentPosition((position) => {
                    console.log("posisi: ", position);
                    location = position;
                    const camera = document.querySelector('#camera');
                    camera.setAttribute('gps-camera', `latitude: ${position.coords.latitude}; longitude: ${position.coords.longitude};`);
                });
            }
        }
        );

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


        const removeEntity = () => {
            const model = document.querySelector('#modelLocationBased');
            model.parentNode.removeChild(model);
        }

        const createEntity = () => {
            // if the model is exist, remove it
            if (document.querySelector('#modelLocationBased')) {
                removeEntity();
            }

            // create new model
            // const model = document.createElement('a-entity');
            // model.setAttribute('gltf-model', '{{ "/storage/" . $product->model }}');
            // model.setAttribute('scale', '{{ $product->scale }}');
            // model.setAttribute('position', '{{ $product->position }}');
            // model.setAttribute('rotation', '{{ $product->rotation }}');
            // model.setAttribute('id', 'modelLocationBased');
            // model.setAttribute('animation', `property: rotation; to: {{ $product->model_rotation_x }} {{ $product->model_rotation_y + 360 }} {{ $product->model_rotation_z }}; loop: true; dur: 10000; easing: linear`);
            // model.setAttribute('material', 'shader: flat;');
            // model.setAttribute('gps-entity-place', `latitude: ${location.coords.latitude}; longitude: ${location.coords.longitude};`);
            // model.setAttribute('gps-entity-place-added', true);
            // model.setAttribute('look-at', '[gps-camera]');

            // return model;

            return `
                <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="{{ $product->scale }}" position="{{ $product->position }}" rotation="{{ $product->rotation }}" id="model" animation="property: rotation; to: {{ $product->model_rotation_x }} {{ $product->model_rotation_y + 360 }} {{ $product->model_rotation_z }}; loop: true; dur: 10000; easing: linear" material="shader: flat;" gps-entity-place="latitude: ${location.coords.latitude}; longitude: ${location.coords.longitude};" gps-entity-place-added="true" look-at="[gps-camera]"></a-entity>
            `;
        }


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

            removeEntity();

            // marker.insertAdjacentHTML('beforeend', createEntity());
        });

        // when the camera is not looking at the marker, pause music from $product->music
        marker.addEventListener('markerLost', (ev) => {
            audio.pause();
            setMarkerIndicatorColor('red');
            description.style.display = 'none';

            aScene.insertAdjacentHTML('beforeend', createEntity());

            // marker.insertAdjacentHTML('beforeend', createEntity());
        });
    </script>
</body>

</html>

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

<body>
    <div id="marker-indicator"></div>
    <!-- back button -->
    <a href="{{ route('home') }}" style="position: absolute; top: 10px; left: 10px; z-index: 9999; font-size: 1.5em; color: white; text-decoration: none;">&larr;</a>
    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;">
        <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5" emitevents="true" id="nft">
            <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="5 5 5" position="150 300 -100" rotation="0 180 0" id="model"></a-entity>
            <a-text value="{{ $product->description }}" position="0 -50 0" align="center" width="120" color="#000000"></a-text>
        </a-nft>
        <a-entity camera></a-entity>
    </a-scene>
    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script>
        const markerIndicator = document.querySelector('#marker-indicator');
        const audio = new Audio('{{ asset("storage/" . $product->music) }}');

        const setMarkerIndicatorColor = (color) => {
            markerIndicator.style.backgroundColor = color;
        };

        window.addEventListener('arjs-nft-loaded', (ev) => {
            setMarkerIndicatorColor('blue');
        });

        const marker = document.querySelector('#nft');
        // when the camera is looking at the marker, play music from $product->music
        marker.addEventListener('markerFound', (ev) => {
            audio.play();
            setMarkerIndicatorColor('green');
        });

        // when the camera is not looking at the marker, pause music from $product->music
        marker.addEventListener('markerLost', (ev) => {
            audio.pause();
            setMarkerIndicatorColor('red');
        });

        const model = document.querySelector('#model');
        const mc = new Hammer.Manager(model);

        // add pinch and pan recognizers to the Hammer manager
        mc.add(new Hammer.Pinch());
        mc.add(new Hammer.Pan());

        // set initial scale and position values
        let scale = 1;
        let posX = 0;
        let posY = 0;

        // add event listeners for pinch and pan events
        mc.on('pinch', (ev) => {
            // update the scale value based on the pinch event
            scale *= ev.scale;
            model.setAttribute('scale', `${scale} ${scale} ${scale}`);
        });

        mc.on('pan', (ev) => {
            let rotation = model.getAttribute("rotation")
            switch (ev.direction) {
                case 2:
                    rotation.y = rotation.y + 4
                    break;
                case 4:
                    rotation.y = rotation.y - 4
                    break;
                case 8:
                    rotation.x = rotation.x + 4
                    break;
                case 16:
                    rotation.x = rotation.x - 4
                    break;
                default:
                    break;
            }
            model.setAttribute("rotation", rotation)
        });
    </script>
</body>

</html>
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
    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;">
        <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5">
            <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="5 5 5" position="50 150 0" rotation="0 180 0"></a-entity>
            <a-text value="{{ $product->description }}" position="0 -50 0" align="center" width="120" color="#000000"></a-text>
        </a-nft>
        <a-entity camera></a-entity>
    </a-scene>

    <script>
        const markerIndicator = document.querySelector('#marker-indicator');
        const audio = new Audio('{{ asset("storage/" . $product->music) }}');

        const setMarkerIndicatorColor = (color) => {
            markerIndicator.style.backgroundColor = color;
        };

        const scene = document.querySelector('a-scene');
        scene.addEventListener('arjs-nft-loaded', (ev) => {
            setMarkerIndicatorColor('blue');
        });

        // when the camera is looking at the marker, play music from $product->music
        scene.addEventListener('arjs-nft-found', (ev) => {
            setMarkerIndicatorColor('green');
            audio.play();
        });

        scene.addEventListener('arjs-nft-lost', (ev) => {
            setMarkerIndicatorColor('red');
            audio.pause();
        });
    </script>
</body>

</html>
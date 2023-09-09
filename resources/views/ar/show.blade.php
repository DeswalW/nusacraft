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
</style>

<body>
    <div class="arjs-loader">
        <div>Loading, please wait...</div>
    </div>
    <a-scene vr-mode-ui="enabled: false;" renderer="logarithmicDepthBuffer: true; precision: medium;" embedded arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;">
        <a-nft type="nft" url="{{ 'storage/' . $product->marker }}" smooth="true" smoothCount="10" smoothTolerance=".01" smoothThreshold="5" detectionMode="mono_and_matrix">
            <a-entity gltf-model="{{ '/storage/' . $product->model }}" scale="5 5 5" position="50 150 0" rotation="0 180 0"></a-entity>
        </a-nft>
        <a-entity camera></a-entity>
    </a-scene>

    <script>
        const scene = document.querySelector('#scene');
        const markerIndicator = document.createElement('a-box');
        markerIndicator.setAttribute('color', 'green');
        markerIndicator.setAttribute('position', '0 0 -1');
        markerIndicator.setAttribute('scale', '0.5 0.5 0.5');
        markerIndicator.setAttribute('visible', 'false');
        scene.appendChild(markerIndicator);

        scene.addEventListener('arjs-nft-loaded', (ev) => {
            markerIndicator.setAttribute('visible', 'true');
        });
    </script>
</body>

</html>
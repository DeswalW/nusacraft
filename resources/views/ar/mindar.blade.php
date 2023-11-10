
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        {{ $product->name }}
    </title>
    <script src="https://aframe.io/releases/1.4.2/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mind-ar@1.2.2/dist/mindar-image-aframe.prod.js"></script>
    <style>

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
    <a-scene mindar-image="imageTargetSrc: {{ asset('storage/' . $product->marker) }};" color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
      <a-assets>
	<!-- <img id="card" src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.2.2/examples/image-tracking/assets/card-example/card.png" /> -->
	<a-asset-item id="avatarModel" src="{{ asset('storage/' . $product->model) }}"></a-asset-item>
      </a-assets>

      <a-camera position="0 0 0" look-controls="enabled: false"></a-camera>

      <a-entity mindar-image-target="targetIndex: 0" id="target">
        <!-- <a-plane src="#card" position="0 0 0" height="0.552" width="1" rotation="0 0 0"></a-plane> -->
        <a-gltf-model rotation="{{ $product->rotation }}" position="{{ $product->position }}" scale="{{ $product->scale }}" src="#avatarModel"
          animation="property: rotation; to: {{ $product->model_rotation_x }} {{ $product->model_rotation_y + 360 }} {{ $product->model_rotation_z }}; dur: 5000; easing: linear; loop: true;"
        >
      </a-entity>
    </a-scene>

    <script>
        const target = document.querySelector('#target');
        const markerIndicator = document.querySelector('#marker-indicator');
        const scene = document.querySelector('a-scene');
        const audio = new Audio('{{ asset("storage/" . $product->music) }}');
        const description = document.querySelector('#description');

        audio.loop = true;

        scene.addEventListener('arReady', () => {
            markerIndicator.style.display = 'block';
            markerIndicator.style.backgroundColor = 'blue';
        });

        target.addEventListener('targetFound', () => {
            markerIndicator.style.backgroundColor = 'green';
            audio.play();
            description.style.display = 'block';
        });

        target.addEventListener('targetLost', () => {
            markerIndicator.style.backgroundColor = 'red';
            audio.pause();
            description.style.display = 'none';
        });

    </script>
  </body>
</html>


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
            top: 36px;
            right: 24px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: red;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="marker-indicator"></div>
    <!-- back button -->
    <a href="{{ route('nusacraft') }}" style="position: absolute; top: 24px; left: 24px; z-index: 9999; font-size: 1.5em; border-radius: 8px; padding: 8px; background-color: white; color:black; box-shadow: 8px;  text-decoration: none;">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M15 19.9201L8.47997 13.4001C7.70997 12.6301 7.70997 11.3701 8.47997 10.6001L15 4.08008" stroke="#111111" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
    <!-- product description show when the marker found -->
    <div id="description" style="transition: 100ms; border-top-left-radius: 24px; border-top-right-radius: 24px; padding-bottom: 16px; bottom: 0px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; position: fixed; left: 50%; transform: translateX(-50%); z-index: 9999; background-color: white; color: black; display: none; width: 100%; text-align: center;">
        <p style="text-align: justify; padding-right: 24px; padding-left: 24px;">{{ $product->description }}</p>
        @if ($product->name)
        <a href="{{ ('detail/') . $product->name }}" style="color: [#284067]; text-decoration: none;">
            Selengkapnya..
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

        audio.loop = false;

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

        // when the page is leaving, and audio is playing, pause the audio
        window.addEventListener('beforeunload', () => {
            if (!audio.paused) {
                audio.pause();
            }
        });

    </script>
  </body>
</html>

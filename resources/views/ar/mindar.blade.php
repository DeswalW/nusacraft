
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        {{ $product->name }}
    </title>
    <script src="https://aframe.io/releases/1.4.2/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mind-ar@1.2.2/dist/mindar-image-aframe.prod.js"></script>
  </head>
  <body>
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
  </body>
</html>

<x-main-layout>
    @section('title', $product->name)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $product->name }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') ?? $product->description }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') ?? $product->link }}" required>
                                @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="music" class="form-label">Music</label>
                                <input type="file" class="form-control @error('music') is-invalid @enderror" id="music" name="music">
                                @error('music')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- marker and model -->
                            <div class="mb-3">
                                <label for="marker" class="form-label">Marker</label>
                                <input type="file" class="form-control @error('marker') is-invalid @enderror" id="marker" name="marker">
                                @error('marker')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="model" class="form-label">Model</label>
                                <input type="file" class="form-control @error('model') is-invalid @enderror" id="model" name="model">
                                @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- model position -->
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="model_x" class="form-label">Model X</label>
                                    <input type="number" class="form-control @error('model_x') is-invalid @enderror" id="model_x" name="model_x" value="{{ old('model_x') ?? $product->model_x }}" required>
                                    @error('model_x')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="model_y" class="form-label">Model Y</label>
                                    <input type="number" class="form-control @error('model_y') is-invalid @enderror" id="model_y" name="model_y" value="{{ old('model_y') ?? $product->model_y }}" required>
                                    @error('model_y')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="model_z" class="form-label">Model Z</label>
                                    <input type="number" class="form-control @error('model_z') is-invalid @enderror" id="model_z" name="model_z" value="{{ old('model_z') ?? $product->model_z }}" required>
                                    @error('model_z')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- model rotation -->
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="model_rotation_x" class="form-label">Rotation X</label>
                                    <input type="number" class="form-control @error('model_rotation_x') is-invalid @enderror" id="model_rotation_x" name="model_rotation_x" value="{{ old('model_rotation_x') ?? $product->model_rotation_x }}" required>
                                    @error('model_rotation_x')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="model_rotation_y" class="form-label">Rotation Y</label>
                                    <input type="number" class="form-control @error('model_rotation_y') is-invalid @enderror" id="model_rotation_y" name="model_rotation_y" value="{{ old('model_rotation_y') ?? $product->model_rotation_y }}" required>
                                    @error('model_rotation_y')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="model_rotation_z" class="form-label">Rotation Z</label>
                                    <input type="number" class="form-control @error('model_rotation_z') is-invalid @enderror" id="model_rotation_z" name="model_rotation_z" value="{{ old('model_rotation_z') ?? $product->model_rotation_z }}" required>
                                    @error('model_rotation_z')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- model scale -->
                            <div class="mb-3">
                                <label for="model_scale" class="form-label">Scale</label>
                                <input type="number" class="form-control @error('model_scale') is-invalid @enderror" id="model_scale" name="model_scale" value="{{ old('model_scale') ?? $product->model_scale }}" required>
                                @error('model_scale')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>

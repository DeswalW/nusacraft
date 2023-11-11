<x-main-layout>
    @section('title', $product->name)
    <!-- display in card -->
    <section class="container">
        <div class="row">
            <div class="col-12 col-md-6 gap-2">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                <img src="{{ asset('storage/' . $product->image_description) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-12 col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <h2>
                    Detail
                </h2>
                <p>{{ $product->detail }}</p>
                <p>{{ $product->created_at->diffForHumans() }}</p>
                <audio controls>
                    <source src="{{ asset('storage/' . $product->music) }}" type="audio/mpeg">
                </audio>
                <div class="mt-3">
                    <a href="{{ asset('storage/' . $product->model) }}" class="btn btn-primary">Download Model</a>
                    <a href="{{ asset('storage/' . $product->marker) }}" class="btn btn-primary">Download Marker</a>
                </div>
                <!-- back, edit, delete button -->
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-main-layout>

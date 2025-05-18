@extends('admin.layout.template')

@section('title', 'Product')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Edit Product
        </div>

        <div class="card-body">

            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" id="code" name="code" class="form-control"
                                value="{{ old('code') ? old('code') : $product->code }}">

                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($categories as $cat)
                                    <option 
                                        value="{{ $cat->id }}" 
                                        @if($cat->id == (old('category_id') ? old('category_id') : $product->category_id)) selected @endif>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') ? old('name') : $product->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="{{ old('description') ? old('description') : $product->description }}">

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="{{ old('price') ? old('price') : $product->price }}">

                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" id="discount" name="discount" class="form-control"
                                value="{{ old('discount') ? old('discount') : $product->discount }}">

                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control"
                                value="{{ old('qty') ? old('qty') : $product->qty }}">

                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Images</label>
                            <input type="file" class="form-control" id="image" name="images[]" multiple>
                        </div>
                    </div>

                    {{-- old images --}}
                    <div class="col-12 col-md-8">
                        <div class="d-flex">
                            @foreach ($product->images as $img)
                                <div class="mx-2 text-center img-box">
                                    <img src="{{ asset($img->image_url) }}" alt="" width="100" height="100" class="d-block mb-2">
                                    <i class="fas fa-times-circle text-danger remove-image" 
                                        title="Remove" 
                                        style="font-size: 25px; cursor: pointer;"
                                        data-id="{{ $img->id }}"
                                        data-line_item_no="{{ $img->line_item_no }}"
                                        data-image="{{ $img->image_url }}"
                                        ></i>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="text-center my-5">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-5">Back</a>
                    <button type="submit" class="btn btn-outline-primary px-5">Save</button>
                </div>

            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>

        // remove old image
        $(document).on('click', '.remove-image', function(){
            const $this = $(this);
            const id = $this.attr('data-id');
            const line_item_no = $this.attr('data-line_item_no');
            const image_url = $this.attr('data-image');

            $.ajax({
                type: 'DELETE',
                url: "{{ route('product.image.remove') }}",
                data: {
                    id,
                    line_item_no,
                    image_url,
                    _token: "{{ csrf_token() }}",
                },
                success: function(){
                    $this.parent('.img-box').remove();
                }
            });

        });
    </script>
@endsection

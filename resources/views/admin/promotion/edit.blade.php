@extends('admin.layout.template')

@section('title', 'Promotion')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Promotion</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Edit Promotion
        </div>

        <div class="card-body">

            <form action="{{ route('promotions.update', $promotion->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @php
                    $productId = old('product_id') ?? $promotion->product_id;
                @endphp

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">Select...</option>
                                @foreach ($products as $prod)
                                    <option value="{{ $prod->id }}" @if ($prod->id == $productId) selected @endif>
                                        {{ $prod->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control"
                                value="{{ old('description') ?? $promotion->description }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="discount">Discount(%)</label>
                            <input type="number" id="discount" name="discount" class="form-control"
                                value="{{ old('discount') ?? $promotion->discount }}">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control"
                                value="{{ old('price') ?? $promotion->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="effective_date">Effective Date</label>
                            <input type="date" id="effective_date" name="effective_date" class="form-control"
                                value="{{ old('effective_date') ?? $promotion->formated_effective_date }}">
                            @error('effective_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="expired_date">Expired Date</label>
                            <input type="date" id="expired_date" name="expired_date" class="form-control"
                                value="{{ old('expired_date') ?? $promotion->formated_expired_date }}">
                            @error('expired_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>

                    {{-- image --}}
                    <div class="col-12 col-md-8">
                        @if ($promotion->image_url)
                            <div id="displayImage">
                                <img src="{{ asset($promotion->image_url) }}" alt="" width="100" height="100"
                                    class="img-thumbnail">
    
                                <i class="fas fa-times-circle text-danger" style="font-size: 25px;cursor:pointer;"
                                    title="Remove Image" onclick="removeImage({{ $promotion->id }})">
                                </i>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="text-center my-5">
                    <a href="{{ route('promotions.index') }}" class="btn btn-outline-secondary px-5">Back</a>
                    <button type="submit" class="btn btn-outline-primary px-5">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function removeImage(id) {
            $.ajax({
                type: 'delete',
                url: `/admin/promotions/${id}/removeImage`, 
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(res) {
                    $('#displayImage').empty();
                }
            })
        }
    </script>
@endsection

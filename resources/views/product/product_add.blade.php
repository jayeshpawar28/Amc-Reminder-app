@extends('includes.main')

@section('content')
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('includes.navbar')

        <!-- Navbar End -->

        <div class="container-fluid pt-4 px-4">
            <form method="POST"
                action="{{ isset($product) ? route('product.update', $product->product_pk) : route('product.store') }}">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                
                <div class="row bg-light p-4 rounded h-100">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="">Product > Add</h6>
                        <div class="buttons">
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Product Add</a> |
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Product List</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                id="floatingInput" placeholder="name@example.com" name="product_name"
                                value="{{ old('product_name', isset($product) ? $product->product_name : '') }}">
                            <label for="floatingInput">Product Name</label>
                            <span class="text-danger">
                                @error('product_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px;" name="remark">{{ old('remark', isset($product) ? $product->remark : '') }}</textarea>
                            <label for="floatingTextarea">Remark</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('product_rate') is-invalid @enderror"
                                id="floatingInput" placeholder="name@example.com" name="product_rate"
                                value="{{ old('product_rate', isset($product) ? $product->product_rate : '') }}">
                            <label for="floatingInput">Product Rate</label>
                            <span class="text-danger">
                                @error('product_rate')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </div>
        </div>

        </form>
    @endsection

@extends('includes.main')

@section('content')
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('includes.navbar')

        <!-- Navbar End -->
        @php
            $todayDate = date('Y-m-d');
        @endphp
        <div class="container-fluid pt-4 px-4">
            <form method="POST" action="{{route('customer.store')}}">
                @csrf
                <div class="row bg-light p-4 rounded h-100">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="">Customer > Add</h6>
                        <div class="buttons">
                            <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary">Customer Add</a> |
                            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-primary">Customer List</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6 type="submit" class="my-3">Customer Details :</h6>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer Name</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="exampleInputEmail1" name="customer_name" value="{{ old('customer_name')}}">
                            <span class="text-danger">
                                @error('customer_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mobile</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="exampleInputEmail1" name="mobile" value="{{ old('mobile') }}">
                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="send_email" name="send_email">
                            <label for="send_email" class="form-label">Send Email to Customer ?</label>
                        </div>
                        
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" name="address" value="{{ old('address') }}">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6 type="submit" class="my-3">Product Details :</h6>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Product</label>
                            <select class="form-select" aria-label="Default select example" name="product_fk">
                                <option selected disabled>-- Select Product --</option>
                                @foreach($products as $product)
                                    <option value="{{$product->product_pk}}" {{ old('product_fk') == $product->product_pk ? 'selected' : '' }}>{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('product_fk')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Start Date : </label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="exampleInputEmail1" name="start_date" value="{{ $todayDate }}">
                            <span class="text-danger">
                                @error('start_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Remark : </label>
                                    <textarea class="form-control @error('product_remark') is-invalid @enderror" name="product_remark" id="exampleFormControlTextarea1" rows="3">{{ old('product_remark') }}</textarea>                                  
                            <span class="text-danger">
                                @error('product_remark')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Warranty Year</label>
                            <input type="text" class="form-control @error('warranty_year') is-invalid @enderror" id="warranty_year" name="warranty_year" value="1" placeholder="1 Year" readonly>
                            <span class="text-danger">
                                @error('warranty_year')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="service_frequency" class="form-label">Service Frequency:</label>
                            <select class="form-select @error('service_frequency') is-invalid @enderror" aria-label="Default select example" name="service_frequency" id="service_frequency">
                                <option selected disabled>--Select Frequency--</option>
                                <option value="3" {{ old('service_frequency') == '3' ? 'selected' : '' }}>
                                    After 3 Month (Total 4 Services)
                                </option>
                                <option value="4" {{ old('service_frequency') == '4' ? 'selected' : '' }}>
                                    After 4 Month (Total 3 Services)
                                </option>
                                <option value="6" {{ old('service_frequency') == '6' ? 'selected' : '' }}>
                                    After 6 Month (Total 2 Services)
                                </option>
                            </select>
                            <span class="text-danger">
                                @error('service_frequency')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Amount : </label>
                            <input type="text" class="form-control @error('product_amount') is-invalid @enderror" id="exampleInputEmail1" name="product_amount" value="{{ old('product_amount') }}">
                            <span class="text-danger">
                                @error('product_amount')
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

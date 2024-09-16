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
            <form method="POST" action="{{route('customer.update', $data->customer_pk)}}">
                @method('PUT')
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
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="exampleInputEmail1" name="customer_name" value="{{ old('customer_name', isset($data->customer_name) ? $data->customer_name : '')}}">
                            <span class="text-danger">
                                @error('customer_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mobile</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="exampleInputEmail1" name="mobile" value="{{ old('mobile', isset($data->mobile) ? $data->mobile : '') }}">
                            <span class="text-danger">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email', isset($data->email) ? $data->email : '') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" name="address" value="{{ old('address', isset($data->address) ? $data->address : '') }}">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success mt-3">Update</button>
                    </div>
                </div>
        </div>

        </form>
    @endsection

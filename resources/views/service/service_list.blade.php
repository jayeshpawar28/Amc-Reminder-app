@extends('includes.main')

@section('content')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('includes.navbar')
            <!-- Navbar End -->
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                @if(session('msg'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="">Service > List</h6>
                                <div class="buttons">
                                    @include('service.tabs')
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Product Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr onclick="window.location='{{ route('customer.show', $row->customer->customer_pk) }}'" style="cursor: pointer;">
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ \Carbon\Carbon::parse($row->service_date)->format('d-m-Y')}}</td>
                                            <td>{{$row->customer->customer_name}}</td>
                                            <td>{{$row->product->product_name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            
        
            
@endsection


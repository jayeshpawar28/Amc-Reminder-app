@extends('includes.main')

@section('content')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('includes.navbar')
            <!-- Navbar End -->
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="">Customer > Details</h6>
                                <div class="buttons">
                                    <form action="{{ route('customer.destroy', $data->customer_pk) }}" method="POST" onsubmit="confirm('Confirm to Delete This Record')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button> |
                                    <a href="{{route('customer.edit', $data->customer_pk)}}" class="btn btn-sm btn-primary">Update</a>
                                </form>
                                </div>
                            </div>
    
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    Customer Name :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->customer_name))
                                        {{ $data->customer_name }}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Contact No. :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->mobile))
                                        {{ $data->mobile }}
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-2">
                                    Product Name :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->product->product_name))
                                        {{ $data->product->product_name }}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Product Rate :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->product_amount))
                                        {{ $data->product_amount }}
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-2">
                                    Contract Start Date :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->start_date))
                                    {{ \Carbon\Carbon::parse($data->start_date)->format('d-m-Y') }}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Contract End Date :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->end_date))
                                    {{ \Carbon\Carbon::parse($data->end_date)->format('d-m-Y') }}
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-2">
                                    Gmail Id :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->email))
                                        {{ $data->email }}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Service Frequency :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->service_frequency))
                                    After {{$data->service_frequency}} Months
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-2">
                                    Address
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->address))
                                        {{ $data->address }}
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    Product Remark :
                                </div>
                                <div class="col-md-4">
                                    @if (isset($data->product_remark))
                                     {{$data->product_remark}} 
                                    @endif
                                </div>
                            </div>
    
                           
    
                            <h6 class="my-4">Next Service Dates :</h6>
                            <div class="table-responsive">
    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Product Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        @foreach ($serviceDetail as $row)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ \Carbon\Carbon::parse($row->service_date)->format('d-m-Y') }}</td>
                                                <td>{{ $row->product->product_name }}</td>
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


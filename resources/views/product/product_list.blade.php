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
                                <h6 class="">Product > List</h6>
                                <div class="buttons">
                                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Product Add</a> |
                                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Product List</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr.</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Remark</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$row->product_name}}</td>
                                            <td>{{$row->product_rate}}</td>
                                            <td>{{$row->remark}}</td>
                                            <td><a href="{{route('product.edit', $row->product_pk)}}">Update</a> |
                                            <form action="{{route('product.destroy', $row->product_pk)}}" method="POST" onsubmit="confirm('Confirm to Delete Record')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-dager">Delete</button>
                                            </form>
                                            </td>
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


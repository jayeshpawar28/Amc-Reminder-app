<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h4 class="">Welcome !</h4>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="ms-3">
                {{-- <h6 class="mb-0">{{ Auth::user()->username ?? 'Guest' }}</h6> --}}
                {{-- <h6 class="mb-0">{{ Auth::user()->username }}</h6> --}}
                {{-- <h6 class="mb-0">@if(Auth::check())
                    {{ucfirst(Auth::user()->username) }}
                @else
                    Guest
                @endif
                </h6> --}}
                {{-- <span>Admin</span> --}}
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('product.index')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Product</a>
            <a href="{{route('customer.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Customer</a>
            <a href="{{route('service.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Services</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
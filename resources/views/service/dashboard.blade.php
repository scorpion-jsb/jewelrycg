<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-9">
        <div class="container">
            <div class="seller-dash-nav mb-4">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ count(explode('.', \Route::currentRouteName())) == 2 ? 'active' :'' }}" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::currentRouteName() == 'dashboard' ? 'active' :'' }}" href="{{ route('dashboard') }}">User Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card m-0">
                        <div class="card-body">
                            <nav class="navbar bg-light navbar-light">
                                <div class="container-fluid">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link {{ \Route::currentRouteName() == 'seller.dashboard' ? 'active' :'' }}" href="{{ route('seller.dashboard') }}">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ \Route::currentRouteName() == 'services.dashboard' ? 'active' :'' }}" href="{{ route('services.dashboard') }}">Services</a>
                                        </li>
                                        <li class="nav-item">
                                            {{-- <a class="nav-link {{ \Route::currentRouteName() == 'courses.dashboard' ? 'active' :'' }}" href="{{ route('courses.dashboard') }}">Courses</a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="seller-stats mb-4">
                        <div class="seller-stats-card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card m-0">
                                        <div class="card-header blance-title">Available To Withdraw</div>
                                        <div class="card-body">
                                            <p class="fw-bold">$ {{ number_format($seller->wallet/100, 2, ".", ",") }}</p>
                                            <a href="" class="btn btn-sm btn-primary">Withdraw</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card m-0 h-100">
                                        <div class="card-header blance-title">Pending Balance</div>
                                        <div class="card-body">
                                            <p class="fw-bold">$ {{ number_format($pendingBalance/100, 2, ".", ",") }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card m-0 h-100">
                                        <div class="card-header blance-title">Total Earned</div>
                                        <div class="card-body">
                                            <p class="fw-bold">$ {{ number_format($totalEarned/100, 2, ".", ",") }}</p>
                                            <a href="{{ route('seller.transaction.history') }}" class="btn btn-sm btn-primary">View History</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"><a class="btn btn-sm btn-primary" href="{{ route('seller.services.create') }}">Add Service</a></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <img src="{{ $service->thumb->getImageOptimizedFullName(400) }}"
                                                    alt="" style="width: 100%;" class="mb-2">
                                                <a class="text-black" href="/services/{{ $service->id }}">
                                                    <h6>{{ $service->name }}</h6>
                                                </a>
                                                @if ($service->status == 1)
                                                    <div class="fw-bold mb-2">Status : Active</div>
                                                @endif
                                                @if ($service->status == 0)
                                                    <div class="fw-bold mb-2">Status : Pending</div>
                                                @endif
                                                @if ($service->status == 3)
                                                    <div class="fw-bold mb-2">Status : Draft</div>
                                                @endif
                                                @if ($service->status == 4)
                                                    <div class="fw-bold mb-2">Status : Denied</div>
                                                @endif
                                                <a class="btn btn-primary" href="/seller/services/edit/{{$service->id}}">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> <!-- end .col-9 -->
            </div> <!-- .row -->
        </div>
    </div>
</x-app-layout>

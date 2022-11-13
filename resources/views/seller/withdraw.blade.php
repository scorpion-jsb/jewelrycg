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
                      <a class="nav-link {{ \Route::currentRouteName() == 'seller.dashboard' ? 'active' :'' }}" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ \Route::currentRouteName() == 'dashboard' ? 'active' :'' }}" href="{{ route('dashboard') }}">User Dashboard</a>
                  </li>
              </ul>
          </div>
          <div class="row">
              <div class="col-3">
                  <x-dashboard-side-bar />
              </div>
              <div class="col-9">
                  <div class="seller-stats mb-4">
                      <div class="seller-stats-card-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="card m-0">
                                      <div class="card-header blance-title">Available To Withdraw</div>
                                      <div class="card-body">
                                          <p class="fw-bold">$ {{ number_format($withdrawable/100, 2, ".", ",") }}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="card m-0 h-100">
                                      <div class="card-header blance-title">Wallet</div>
                                      <div class="card-body">
                                          <p class="fw-bold">$ {{ number_format($seller->wallet/100, 2, ".", ",") }}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="card m-0 h-100">
                                      <div class="card-header blance-title">Total Earned</div>
                                      <div class="card-body">
                                          <p class="fw-bold">$ {{ number_format($totalEarned/100, 2, ".", ",") }}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3"></div>
                          </div>
                      </div>
                  </div>
              </div> <!-- end .col-9 -->
          </div> <!-- .row -->
      </div>
  </div>
</x-app-layout>

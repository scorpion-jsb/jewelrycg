<x-app-layout>
  <style>
      .pur {
          width: 100%;
          margin-bottom: 8px;
      }
  </style>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-9">
      <div class="container">
          <div class="row">
                <div class="col-md-12">
                    <h3>Service Orders</h3>
                </div>
                <div class="col-3">
                    <x-dashboard-side-bar />
                </div>
                <div class="col-md-9">
                  <div class="card rounded-0">
                      <div class="datatable-custom position-relative">
                          <table class="table table-lg table-thead-bordered table-nowrap table-align-middle card-table dataTable table-responsive no-footer">
                              <thead class="thead-light">
                                  {{-- <th>ID</th> --}}
                                  <th>Buyer</th>
                                  <th>Service Name - Package</th>
                                  <th>Price</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                              </thead>

                              <tbody>
                                  @foreach ($orders as $order)
                                  <tr>
                                  {{-- <td>#{{ $order->order_id }}</td> --}}
                                    <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                    <td>{{ $order->service->name . " - " . $order->package_price }}</td>
                                    <td>${{ $order->package_price }}</td>
                                    <td>
                                        @if ($order->status == 0)
                                        Pending
                                        @elseif ($order->status == 1)
                                        In Progress
                                        @elseif ($order->status == 2)
                                        Revision
                                        @elseif ($order->status == 3)
                                        Canceled
                                        @else
                                        Delivered
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-dark btn-sm" href="">View</a>
                                        </div>
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
  </div>
</x-app-layout>

@section('js')
  <script>
  </script>
@endsection

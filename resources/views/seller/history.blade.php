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
            <div class="header mb-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">User Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">Transaction History</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $key=> $transaction)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <th>$ {{ number_format($transaction->amount/100, 2, ".", ",") }}</th>
                                    <th>{{ $transaction->type == 'add' ? 'Sale' : 'Withdrawn' }}</th>
                                    <th>{{ $transaction->created_at->format('M d, Y') }}</th>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .blance-title{
            color: rgb(1, 119, 189);
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</x-app-layout>

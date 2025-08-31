@extends('admin.layout.template')

@section('title', 'Orders')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Home/Order
                </h6>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Number</th>
                            <th>Slip</th>
                            <th>Customer</th>
                            <th>Tracking</th>
                            <th>Address</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Discount</th>
                            <th class="text-right">Delivery Fee</th>
                            <th class="text-right">Amount</th>
                            <th>Remark</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $i => $order)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $order['number'] }}</td>
                                <td>
                                    <img src="{{ $order['slip'] }}" alt="" width="100">
                                </td>
                                <td>{{ $order['customer'] }}</td>
                                <td>{{ $order['tracking'] }}</td>
                                <td>{{ $order['address'] }}</td>
                                <td class="text-right">{{ $order['qty'] }}</td>
                                <td class="text-right">{{ $order['discount'] }}</td>
                                <td class="text-right">{{ $order['delivery_fee'] }}</td>
                                <td class="text-right">{{ $order['amount'] }}</td>
                                <td>{{ $order['remark'] }}</td>
                                <td>{!! $order['status'] !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

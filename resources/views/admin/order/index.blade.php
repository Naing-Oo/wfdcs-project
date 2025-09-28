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

            <form action="{{ route('orders.index') }}">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate" value="{{ $fromDate }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input type="date" class="form-control" id="toDate" name="toDate" value="{{ $toDate }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="" style="opacity: 0;">xx</label><br>

                            <button type="submit" class="btn btn-secondary">Search</button>

                            <a href="{{ route('orders.update', 1) . '?status=approved' }}" class="btn btn-primary btn-action">Approve
                                Payment</a>
                            <a href="{{ route('orders.update', 1) . '?status=shipped' }}" class="btn btn-secondary btn-action">Shipped</a>
                            <a href="{{ route('orders.update', 1) . '?status=received' }}" class="btn btn-success btn-action">Received</a>
                            <a href="{{ route('orders.update', 1) . '?status=cancel' }}" class="btn btn-danger btn-action">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Number</th>
                            <th>Date</th>
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
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value="{{ $order['id'] }}">
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ $order['link'] }}" class="btn-show">
                                        {{ $order['number'] }}
                                    </a>
                                </td>
                                <td>{{ $order['date'] }}</td>
                                <td>
                                    <img src="{{ $order['slip'] }}" alt="" width="100">
                                </td>
                                <td>{{ $order['customer'] }}</td>
                                <td>{{ $order['tracking'] }}</td>
                                <td>{!! $order['address'] !!}</td>
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

    @include('admin.order.modal')
@endsection

@section('script')
    <script>
        $(document).on('click', '.btn-action', function(e) {
            e.preventDefault();

            const url = $(this).attr('href');
            var orderIds = [];

            $('input[type="checkbox"]:checked').each(function() {
                orderIds.push($(this).val());
            })

            if (orderIds.length === 0) {
                alertError("Please select order.");
                return;
            }

            $.ajax({
                type: 'PUT',
                url: url,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'orderIds': orderIds
                },
                success: function(res) {
                    alertSuccess(res);
                    window.location.reload();
                }
            })
        });



        $(document).on('click', '.btn-show', function(e) {

            e.preventDefault();

            const url = $(this).attr('href');

            $.get(url, function(res) {
                // console.log(res);

                for (const key in res) {
                    // console.log(`key${key} - value${res[key]}`);

                    if (key !== 'items') {

                        if (key === 'address') {
                            $(`#${key}`).html(res[key]);
                        } else {
                            $(`#${key}`).text(res[key]);
                        }
                    }
                }

                // console.log(res.items);
                const tbody = $('table#items tbody');

                tbody.children().remove();

                let rows = res.items.map(item => `
                    <tr>
                        <td>${item.number}</td>
                        <td>${item.product}</td>
                        <td class="text-right">${item.price}</td>
                        <td class="text-right">${item.qty}</td>
                        <td class="text-right">${item.total}</td>
                    </tr>
                `).join('');

                // console.log(rows);

                tbody.append(rows);

                $('#orderDetails').modal('show');
            });

        });
    </script>
@endsection

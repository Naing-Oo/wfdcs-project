@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Orders',
    ])
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">

            <h3 class="mb-3">My orders</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Tracking</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $o)
                        <tr>
                            <td>
                                <a href="{{ route('account.order', $o['id']) }}" class="btn-link btn-show">
                                    {{ $o['number'] }}
                                </a>
                                <div>
                                    @if ($o['status_code'] === 'pending')
                                        <a href="{{ route('checkout.edit', $o['id']) }}" class="btn btn-primary">
                                            Payment
                                            {{-- <i class="fa fa-credit-card-alt" aria-hidden="true"></i> --}}
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $o['date'] }}</td>
                            <td>{{ $o['tracking'] }}</td>
                            <td>{!! $o['address'] !!}</td>
                            <td>{{ $o['amount'] }}</td>
                            <td>{!! $o['status'] !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </section>
    <!-- Product Section End -->
    @include('admin.order.modal')
@endsection

@section('script')
    <script src="{{ asset('assets/js/order.js') }}"></script>
@endsection

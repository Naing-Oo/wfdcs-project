@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Manage',
    ])
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <h3 class="mb-3">Personal information</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h3 class="mb-3">Address book</h3>
            <a href="" class="btn-link"><i class="fa fa-plus-square" aria-hidden="true"></i> New</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Default</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addresses as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->is_default }}</td>
                            <td>
                                <a href="{{ route('account.address', $item->id) }}" class="btn btn-primary btnEdit">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
    <!-- Product Section End -->

    @include('web.account.address-modal')
@endsection

@section('script')
    <script>
        $(document).on('click', '.btnEdit', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            $modal = $('#addressModal');

            $.get(url, function(res) {

                for (const key in res) {
                    $modal.find(`#${key}`).val(res[key]).trigger('change');
                }

            });

            $modal.modal('show');
        });

        $(document).on('click', '#btnSubmit', function() {
            $form = $('#frmCheckout');

            const formData = new FormData($form[0]);
            const routeName = $form.attr('action');

            submitForm(routeName, formData);
        });
    </script>
@endsection

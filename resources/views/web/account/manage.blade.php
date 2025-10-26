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
            <div>
                <form action="{{ route('account.update', $user->id) }}" method="post">

                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                                @if (session('error'))
                                    <span class="text-danger">{{ session('error') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="" style="opacity: 0;">xxx</label><br>
                            <div class="d-flex align-items-center">
                                <div class="form-check mr-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="show-password">Show
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i> Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <h3 class="mb-3">Address book</h3>
            <a href="#" class="btn-link btnNew"><i class="fa fa-plus-square" aria-hidden="true"></i> New</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Default</th>
                        <th class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addresses as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{!! $item->default !!}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('account.address', $item->id) }}" class="text-success p-2 btnEdit">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('account.address.remove', $item->id) }}" class="text-dark p-2 btnRemove">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </div>
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
        const $modal = $('#addressModal');


        // ===== edit address
        $(document).on('click', '.btnEdit', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            $.get(url, function(res) {

                for (const key in res) {

                    $modal.find(`#${key}`).val(res[key]);

                    if (key === 'is_default' && res[key]) {
                        $modal.find(`#is_default`).val(1).prop('checked', true);
                    } else {
                        $modal.find(`#is_default`).val(1).prop('checked', false);
                    }

                    if (key === 'district_id') {
                        defaultDistrict(res.district_id, res.province_id);
                    }
                    if (key === 'sub_district_id') {
                        defaultSubDistrict(res.sub_district_id, res.district_id);
                    }
                }
            });

            $modal.modal('show');
        });

        // =========== remove address
        $(document).on('click', '.btnRemove', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(res) {
                    window.location.href = res.redirect;
                }
            })
        });

        // =========== new address
        $(document).on('click', '.btnNew', function(e) {
            e.preventDefault();
            $modal.modal('show');
        });


        // ================== get districts by province id && auto selected district
        function defaultDistrict(districtId, provinceId) {
            getDistrict(provinceId, districtId);
        }
        // ================== get sub districts by province id && auto selected sub district
        function defaultSubDistrict(subDistrictId, districtId) {
            getSubDistrict(districtId, subDistrictId);
        }

        $(document).on('click', '#btnSubmit', function() {
            $form = $('#frmCheckout');

            const formData = new FormData($form[0]);
            const routeName = $form.attr('action');

            submitForm(routeName, formData);
        });

        $('#show-password').on('change', function() {
            let isShow = $(this).is(':checked');
            let type = isShow ? 'text' : 'password';
            $('#password').attr('type', type);
        })
    </script>
@endsection

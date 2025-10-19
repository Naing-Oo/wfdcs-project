@php
    use App\Models\Province;
    $provinces = Province::get();
@endphp

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name" form="frmCheckout"
                value="{{ $address->name }}" required>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" form="frmCheckout"
                value="{{ $address->phone }}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" id="address" name="address" form="frmCheckout"
                value="{{ $address->address }}" required>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Province</label>
            <select class="form-control" name="province_id" id="province_id" form="frmCheckout"
                value="{{ $address->province_id }}" required>
                <option value="">select...</option>
                @foreach ($provinces as $p)
                    <option value="{{ $p->id }}" @if ($p->id == $address->province_id) selected @endif>
                        {{ $p->name_en }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">District</label>
            <select class="form-control" name="district_id" id="district_id" form="frmCheckout"
                value="{{ $address->district_id }}" required>
                <option value="">select...</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Sub District</label>
            <select class="form-control" name="sub_district_id" id="sub_district_id" form="frmCheckout"
                value="{{ $address->sub_district_id }}" required>
                <option value="">select...</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" form="frmCheckout"
                value="{{ $address->postcode }}" required>
        </div>
    </div>

</div>

@push('js')
    <script>
        const $selectDistrict = $('#district_id');
        const $selectSubDistrict = $('#sub_district_id');
        const $inputPostcode = $('#postcode');

        const init = {
            provinceId: @json($address->province_id),
            districtId: @json($address->district_id),
            subDistrictId: @json($address->sub_district_id),
            postcode: @json($address->postcode),
        }

        const state = { // obj
            subDistricts: [], // array
            selected: { // obj
                'province_id': 0,
                'district_id': 0,
                'sub_district_id': 0,
                'postcode': "",
            }
        };

        // initialization
        $(document).ready(() => {
            getDistrict(init.provinceId, init.districtId);
            getSubDistrict(init.districtId, init.subDistrictId);
            $inputPostcode.val(init.postcode);
        });

        // === keyup, keydown, blur
        // $(document).on('blur', '#name', function() {
        //     const value = $(this).val();
        //     $('#phone').val(value);
        // });

        // event change select.province_id
        $(document).on('change', '#province_id', function() {
            const provinceId = $(this).val();
            getDistrict(provinceId);
        });

        // set district_id
        $(document).on('change', '#district_id', function() {
            const districtId = $(this).val();

            if (districtId == null)
                return;

            getSubDistrict(districtId);
        });

        $(document).on('change', '#sub_district_id', function() {
            const subDistrictId = $(this).val();
            getPostcode(subDistrictId);
        });


        // ================== get districts by province id
        function getDistrict(provinceId, districtId = null) {

            // set province_id
            state.selected.province_id = provinceId;

            // console.log(state.selected);

            $selectDistrict.children().remove();
            $selectSubDistrict.children().remove();
            $inputPostcode.val('');

            // ajax get method url('district/provinceId');
            $.get(`/district/${provinceId}`, function(res) {

                let option = `<option value="">select...</option>`;

                $selectDistrict.children().remove();

                res.forEach(district => {

                    let selected = district.id == districtId ? 'selected' : '';

                    // append option
                    option += `<option value="${district.id}" ${selected}>${district.name}</option>`;
                });

                $selectDistrict.append(option);
            });

        }

        // =================== get sub district by district id
        function getSubDistrict(districtId, subDistrictId = null) {

            state.selected.district_id = districtId;

            $.get(`/subdistrict/${districtId}`, function(res) {

                state.subDistricts = [...res]; // copy

                // console.log(subDistricts);

                let option = `<option value="">select...</option>`;

                $selectSubDistrict.children().remove();

                res.forEach(item => {

                    let selected = item.id == subDistrictId ? 'selected' : '';

                    option += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                });

                $selectSubDistrict.append(option);
            });
        }

        // ================ get postcode by sub district id
        function getPostcode(subDistrictId) {

            state.selected.sub_district_id = subDistrictId;
            // console.log(state.subDistricts);

            const subDistrict = state.subDistricts.find(s => s.id == subDistrictId);

            // console.log(subDistrict);

            $inputPostcode.val(subDistrict.postcode);
            state.selected.postcode = subDistrict.postcode;

            // console.log(state.selected);
        }
    </script>
@endpush

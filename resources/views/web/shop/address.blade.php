@php
    use App\Models\Province;
    $provinces = Province::get();
@endphp

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" id="name" name="name" form="frmCheckout" required>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" form="frmCheckout" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" id="address" name="address" form="frmCheckout" required>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Province</label>
            <select class="form-control" name="province_id" id="province_id" form="frmCheckout" required>
                <option value="">select...</option>
                @foreach ($provinces as $p)
                    <option value="{{ $p->id }}">{{ $p->name_en }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">District</label>
            <select class="form-control" name="district_id" id="district_id" form="frmCheckout" required>
                <option value="">select...</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Sub District</label>
            <select class="form-control" name="sub_district_id" id="sub_district_id" form="frmCheckout" required>
                <option value="">select...</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" form="frmCheckout" required>
        </div>
    </div>

</div>

@push('js')
    <script>
        const $selectDistrict = $('#district_id');
        const $selectSubDistrict = $('#sub_district_id');
        const $inputPostcode = $('#postcode');

        const state = { // obj
            subDistricts: [], // array
            selected: { // obj
                'province_id': 0,
                'district_id': 0,
                'sub_district_id': 0,
                'postcode': "",
            }
        };

        // === keyup, keydown, blur
        // $(document).on('blur', '#name', function() {
        //     const value = $(this).val();
        //     $('#phone').val(value);
        // });

        // event change select.province_id
        $(document).on('change', '#province_id', function() {
            const provinceId = $(this).val();

            // set province_id
            state.selected.province_id = provinceId;

            // console.log(state.selected);

            $selectDistrict.children().remove();
            $selectSubDistrict.children().remove();
            $inputPostcode.val('');

            // ajax get method url('district/provinceId');
            $.get(`/district/${provinceId}`, function(res) {

                // console.log(res);

                let option = `<option value="">select...</option>`;

                $selectDistrict.children().remove();

                res.forEach(district => {
                    // append option
                    option += `<option value="${district.id}">${district.name}</option>`;
                });

                $selectDistrict.append(option);
            });
        });

        // set district_id
        $(document).on('change', '#district_id', function() {
            const districtId = $(this).val();

            if (districtId == null)
                return;

            state.selected.district_id = districtId;

            // console.log(state.selected);

            $.get(`/subdistrict/${districtId}`, function(res) {

                state.subDistricts = [...res]; // copy

                // console.log(subDistricts);

                let option = `<option value="">select...</option>`;

                $selectSubDistrict.children().remove();

                res.forEach(item => {
                    option += `<option value="${item.id}">${item.name}</option>`;
                });

                $selectSubDistrict.append(option);
            });
        });

        $(document).on('change', '#sub_district_id', function() {
            const subDistrictId = $(this).val();
            state.selected.sub_district_id = subDistrictId;

            // console.log(state.subDistricts);

            const subDistrict = state.subDistricts.find(s => s.id == subDistrictId);

            // console.log(subDistrict);

            $inputPostcode.val(subDistrict.postcode);
            state.selected.postcode = subDistrict.postcode;

            // console.log(state.selected);
        });
    </script>
@endpush

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $appends = ['full_address'];

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'province_id',
        'district_id',
        'sub_district_id',
        'postcode',
        'is_default',
        'is_active',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'sub_district_id');
    }

    // get FullAddress Attribute (full_address)
    public function getFullAddressAttribute()
    {
        $province = optional($this->province)->name_en;
        $district = optional($this->district)->name_en;
        $subDistrict = optional($this->subDistrict)->name_en;

        return sprintf(
            '<span>%s</span></br><span>%s</span>',
            $this->address,
            " {$subDistrict}, {$district}, {$province}, {$this->postcode}"
        );

        // return " {$this->address}, {$subDistrict}, {$district}, {$province}, {$this->postcode}";
    }

    public function getDefaultAttribute()
    {
        return $this->is_default
            ? sprintf('<i class="fa fa-check-square-o" aria-hidden="true"></i>')
            : sprintf('<i class="fa fa-square-o" aria-hidden="true"></i>');
    }
}

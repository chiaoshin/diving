<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MarkerFormatter;

class Hotel extends Model
{
    use HasFactory, MarkerFormatter;

    protected $table = "hotel";
    protected $primaryKey = "hotel_id";
    protected $guard = [];

    //關聯
    public function law()
    {
        return $this->hasOne(Law::class,'hotel_id');
    }

    // 邏輯判斷 
    public function getCheckinInfoAttribute()
    {
        if ($this->checkin_start_from && $this->checkin_end_to) {
            return "每日入住時間：" . format_time($this->checkin_start_from) . " ~ " . format_time($this->checkin_end_to);
        } else {
            return "不提供入住時間";
        }
    }

    public function getCheckoutInfoAttribute()
    {
        if ($this->checkout_start_from && $this->checkout_end_to) {
            return "每日退房時間：" . format_time($this->checkout_start_from) . " ~ " . format_time($this->checkout_end_to);
        } else {
            return "不提供退房時間";
        }
    }

    public function getWorkInfoAttribute()
    {
        if ($this->work_start_from && $this->work_end_to) {
            return "
            <p class='d-flex m-0'>
                <span class=\"material-symbols-outlined\">schedule</span>" .
                format_time($this->work_start_from) . " ~ " . format_time($this->work_end_to)
                . "</p>";
        } else {
            return "不提供營業時間";
        }
    }
    public function getTransformInfoAttribute()
    {
        return $this->transform_note ?? '無';
    }
}

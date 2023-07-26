<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MarkerFormatter;

class Shop extends Model
{
    use HasFactory, MarkerFormatter;

    protected $table = "shop";
    protected $primaryKey = "shop_id";
    protected $guard = [];

    // 關聯
    public function law()
    {
        return $this->hasOne(Law::class,'shop_id');
    }

    // 邏輯判斷
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = "partner";
    protected $primaryKey = "partner_id";
    protected $guard = [];

    public function getFormatDateAttribute()
    {
        return date('Y年n月j號', strtotime($this->group_time));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangerArea extends Model
{
    use HasFactory;

    protected $table = 'danger_area';
    protected $guarded = [];

    public function positions() {
        return $this->hasMany(DangerAreaPosition::class, 'danger_area_id');
    }
}

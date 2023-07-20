<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MarkerFormatter;

class Index extends Model
{
    use HasFactory, MarkerFormatter;

    protected $table = "map";
    protected $primaryKey = "map_id";
    protected $guard = [];
}

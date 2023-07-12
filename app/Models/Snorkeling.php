<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snorkeling extends Model
{
    use HasFactory;

    protected $table = "map";
    protected $primaryKey = "map_id";
    protected $guard = [];
}

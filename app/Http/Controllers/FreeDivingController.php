<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snorkeling;

class FreeDivingController extends Controller
{
    public function index()
    {
        // $snorkeling = Snorkeling::all();
        // return view('activity_description/snorkeling', compact('snorkeling'));
        return view('activity_description/freeDiving');
    }
}

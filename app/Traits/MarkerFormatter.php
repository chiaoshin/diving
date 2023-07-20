<?php

namespace App\Traits;

trait MarkerFormatter
{

    public static function getFormatterMarkers($conditions)
    {
        return self::where($conditions)->get()->map(function ($row) {
            return [
                "id" => $row->map_id,
                "name" => $row->ch_name,
                "lat" => $row->lat,
                "lng" => $row->lng
            ];
        })->toArray();
    }
}

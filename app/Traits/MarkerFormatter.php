<?php

namespace App\Traits;

trait MarkerFormatter
{

    public static function getFormatterMarkers($conditions)
    {
        return self::where($conditions)->get()->map(function ($row) {
            $url = '';
            
            $key = $row->primaryKey;

            switch (self::class) {
                case 'App\Models\Store':
                    $url = route('store.show', $row->$key);
                    break;
                case 'App\Models\Shop':
                    $url = route('shop.show', $row->$key);
                    break;
                case 'App\Models\Hotel':
                    $url = route('hotel.show', $row->$key);
                    break;
                case 'App\Models\Index':
                    $url = route('map.show', $row->$key);
                    break;
            }

            return [
                "id" => $row->$key,
                "url" => $url,
                "name" => $row->ch_name,
                "lat" => $row->lat,
                "lng" => $row->lng,
                "address" => $row->address
            ];
        })->toArray();
    }
}

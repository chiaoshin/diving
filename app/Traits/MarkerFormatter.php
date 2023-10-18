<?php

namespace App\Traits;

trait MarkerFormatter
{
    public static function getFormatterMarkers($conditions, $searchParm=[])
    {
        $query_builder = self::where($conditions)->orderBy('reviews', 'DESC')->orderBy('star_rating', 'DESC');
        $count = $query_builder->count();

        if (array_key_exists('limit', $searchParm)) {
            $query_builder = $query_builder->limit($searchParm['limit']);
        }

        if (array_key_exists('offset', $searchParm)) {
            $query_builder = $query_builder->offset($searchParm['offset']);
        }

        $result = $query_builder->get()->map(function ($row) {
            $url = '';
            
            $key = $row->primaryKey;

            switch (self::class) {
                case 'App\Models\Store':
                    $url = route('store.show', $row->$key);
                    $type = "store";
                    break;
                case 'App\Models\Shop':
                    $url = route('shop.show', $row->$key);
                    $type = "shop";
                    break;
                case 'App\Models\Hotel':
                    $url = route('hotel.show', $row->$key);
                    $type = "hotel";
                    break;
                case 'App\Models\Index':
                    $url = route('map.show', $row->$key);
                    $type = "map";
                    break;
            }

            $obj = self::find($row->$key);

            return [
                "id" => $row->$key,
                "url" => $url,
                "name" => $row->ch_name,
                "lat" => $row->lat,
                "lng" => $row->lng,
                "address" => $row->address,
                "area" => $row->area,
                "location" => $row->location,
                "type" => $type,
                "rate_star_percent" => $obj->rate_star_percent,
                "reviews" => $obj->reviews,
                "star_rating" => $obj->star_rating,
                "preview_img_url" => $obj->preview_img_url,
                "counter" => $obj->event_counter
            ];
        })->toArray();

        if (array_key_exists('withTotal', $searchParm)) {
            return [$result, $count];
        }else{
            return $result;
        }
    }

    public function getEventCounterAttribute() {
        if (static::class != "App\Models\Index") {
            return 0;
        }

        return $this->accidents ?? 0;
    }

    public function getRateStarPercentAttribute() {
        $score = floor($this->star_rating) * 20 + 5;

        $float = round(($this->star_rating - floor($this->star_rating)) * 10, 0);

        return min($score + $float, 99);
    }
}

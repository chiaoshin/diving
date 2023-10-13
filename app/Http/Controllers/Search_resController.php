<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Index;
use App\Models\Store;
use App\Models\Shop;
use App\Models\Hotel;
use PhpParser\Node\Stmt\Foreach_;

class Search_resController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = request()->validate([
            'area' => 'nullable',
            'location' => 'nullable',
            'type' => 'nullable',
            'page' => 'nullable'
        ]);

        $result = [];
        $conditions = [];
        $conditionsQuery = "";

        if (isset($data['area']) && $data['area'] != '選擇地區') {
            $conditions['area'] = $data['area'];
            $conditionsQuery .= "AND area = '".addslashes($data['area'])."'";
        }

        if (isset($data['location']) && $data['location'] != '選擇縣市') {
            $conditions['location'] = $data['location'];
            $conditionsQuery .= "AND `location` = '".addslashes($data['location'])."'";
        }

        $searchParm = [
            'limit' => 6,
            'offset' => 0,
            'withTotal' => true
        ];

        if (isset($data['page'])) {
            $searchParm['offset'] = max($data['page'] - 1, 0) * $searchParm['limit'];
        }

        if (isset($data["type"]) && $data['type'] != '選擇項目') {
            switch ($data["type"]) {
                case '熱門潛點':
                    list($result, $total) = Index::getFormatterMarkers($conditions, $searchParm);
                    break;
                case '都市潛店':
                    list($result, $total) = Store::getFormatterMarkers($conditions, $searchParm);
                    break;
                case '背包客房':
                    list($result, $total)= Hotel::getFormatterMarkers($conditions, $searchParm);
                    break;
                case '潛水用品店':
                    list($result, $total) = Shop::getFormatterMarkers($conditions, $searchParm);
                    break;
            }

            $conditions['type'] = $data['type'];
        } else {
            $sql = "
                SELECT 
                    * 
                FROM (
                    (
                        SELECT 
                            map_id AS id, ch_name AS name, lat, lng, address, 'Map' as dataType
                        FROM
                            map
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            store_id AS id, ch_name AS name, lat, lng, address, 'Store' as dataType
                        FROM
                            store
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            shop_id AS id, ch_name AS name, lat, lng, address, 'Shop' as dataType
                        FROM
                            shop
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            hotel_id AS id, ch_name AS name, lat, lng, address, 'Hotel' as dataType
                        FROM
                            hotel
                        WHERE TRUE
                        $conditionsQuery
                    )
                ) AS tmp
            ";

            $countSql = "
                SELECT 
                    COUNT(*) AS count
                FROM (
                    (
                        SELECT 
                            map_id AS id, ch_name AS name, lat, lng, address, 'Map' as dataType
                        FROM
                            map
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            store_id AS id, ch_name AS name, lat, lng, address, 'Store' as dataType
                        FROM
                            store
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            shop_id AS id, ch_name AS name, lat, lng, address, 'Shop' as dataType
                        FROM
                            shop
                        WHERE TRUE
                        $conditionsQuery
                    )
                    UNION ALL
                    (
                        SELECT 
                            hotel_id AS id, ch_name AS name, lat, lng, address, 'Hotel' as dataType
                        FROM
                            hotel
                        WHERE TRUE
                        $conditionsQuery
                    )
                ) AS tmp
            ";

            $queryResult = DB::select($sql."LIMIT ". $searchParm['limit']." OFFSET ".  $searchParm['offset'] ."");
            $total = DB::select($countSql)[0]->count;

            foreach ($queryResult as $key => $value) {
                switch ($value->dataType) {
                    case 'Store':
                        $url = route('store.show', $value->id);
                        $obj = Store::find($value->id);
                        break;
                    case 'Shop':
                        $url = route('shop.show', $value->id);
                        $obj = Shop::find($value->id);
                        break;
                    case 'Hotel':
                        $url = route('hotel.show', $value->id);
                        $obj = Hotel::find($value->id);
                        break;
                    case 'Map':
                        $url = route('map.show', $value->id);
                        $obj = Index::find($value->id);
                        break;
                }
                
                array_push($result, [
                    'id' => $value->id,
                    'name' => $value->name,
                    'lat' => $value->lat,
                    'lng' => $value->lng,
                    'address' => $value->address,
                    'url' => $url,
                    "rate_star_percent" => $obj->rate_star_percent,
                    "reviews" => $obj->reviews,
                    "star_rating" => $obj->star_rating,
                    "preview_img_url" =>  $obj->preview_img_url
                ]);
            }

            // list($mapResult, $mapTotal) = Index::getFormatterMarkers($conditions, $searchParm);
            // list($storeResult, $storeTotal) = Store::getFormatterMarkers($conditions, $searchParm);
            // list($hotelResult, $hotelTotal) = Hotel::getFormatterMarkers($conditions, $searchParm);
            // list($shopResult, $shopTotal) = Shop::getFormatterMarkers($conditions, $searchParm);

            // $total = $mapTotal + $storeTotal + $hotelTotal + $shopTotal;

            // $result = array_merge($mapResult, $storeResult, $hotelResult, $shopResult);
        }
        
        $queryParams = "";

        foreach($conditions as $key => $value) {
            $queryParams .= $key . "=" . $value;

            if (!($key == array_key_last($conditions))) {
                $queryParams .= "&";
            }
        }

        $pageInfo = [
            'currPage' => isset($data['page']) ? $data['page'] : 1,
            'totalPage' => ceil($total / $searchParm['limit']),
            'queryParams' => $queryParams
        ];
        
        return view('search_res/show', compact('result', 'pageInfo'));
    }

}

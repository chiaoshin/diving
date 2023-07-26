<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;
use App\Models\Store;
use App\Models\Shop;
use App\Models\Hotel;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diveSite = Index::all();

        return view('index', compact("diveSite"));
    }

    public function search_markers()
    {
        $data = request()->all();

        $conditions = [];
        $result = [];

        if (isset($data['area']) && $data['area'] != '選擇地區') {
            $conditions['area'] = $data['area'];
        }

        if (isset($data['location']) && $data['location'] != '選擇縣市') {
            $conditions['location'] = $data['location'];
        }

        if (isset($data["item"]) && $data['item'] != '選擇項目') {
            switch ($data["item"]) {
                case '熱門潛點':
                    $result = Index::getFormatterMarkers($conditions);
                    break;
                case '都市潛店':
                    $result = Store::getFormatterMarkers($conditions);
                    break;
                case '背包客房':
                    $result = Hotel::getFormatterMarkers($conditions);
                    break;
                case '潛水用品店':
                    $result = Shop::getFormatterMarkers($conditions);
                    break;
            }
        } else {
            $mapResult = Index::getFormatterMarkers($conditions);
            $storeResult = Store::getFormatterMarkers($conditions);
            $hotelResult = Hotel::getFormatterMarkers($conditions);
            $shopResult = Shop::getFormatterMarkers($conditions);

            $result = array_merge($mapResult, $storeResult, $hotelResult, $shopResult);
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show($id)
    {
        // equals: Select * from store where id = ?
        $map = Index::findOrFail($id);

        $message = "小琉球龍蝦洞";

        $dictData = [
            '小琉球龍蝦洞' => '潛水注意事項： \n當地擁有一片美麗的珊瑚礁海岸，海底更有著名的軟珊瑚地毯，可以說是非常值得探索的潛點！ \n雖然潮間帶還算平緩好走，但有時浪比較大，務必要先評估是否適合下水。\n對了，龍蝦洞海底的流也比較強，建議一定要找當地的潛導以確保自身安全！'
        ];

        return view('map/show', compact("map", "message", "dictData"));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}

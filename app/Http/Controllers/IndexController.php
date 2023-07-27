<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;
use App\Models\Store;
use App\Models\Shop;
use App\Models\Hotel;
use App\Models\Chatgpt;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diveSite = Index::getFormatterMarkers([]);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // equals: Select * from store where id = ?
        $map = Index::findOrFail($id);

        // chatgpt
        $gptResponse = Chatgpt::where('keyword', $map->ch_name)->get()->first();

        $dictData = [
            $map->ch_name => !is_null($gptResponse) ? $gptResponse->respond : 'What are u talking about'
        ];

        return view('map/show', compact("map", "dictData"));
    }

    // public function getGPTResponse() {
    //     $keyword = request()->input('keyword');

    //     if (is_null($keyword)) {
    //         return '我不知道您的問題，請重新執行一次，謝謝。';
    //     }
        
    //     $response = Chatgpt::where('keyword',$keyword)->get();

    //     dd($response);
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Index;
use App\Models\Store;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marker = Index::all()->toArray();

        return view('index', compact("marker"));
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
            }
        } else {
            $mapResult = Index::getFormatterMarkers($conditions);
            $storeResult = Store::getFormatterMarkers($conditions);

            $result = array_merge($mapResult, $storeResult);
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
    // public function show($id)
    // {
    //     //
    // }

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

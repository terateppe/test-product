<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {   
        //登録している商品を5件表示させる
        $items=null;
        if($request->id){
            $items=Item::where("type",$request->id)
                ->orderbydesc("created_at")->limit(5)->get();
            
        }
        
        return view('home.index',compact('items'));
    }
}

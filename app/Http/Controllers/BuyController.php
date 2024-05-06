<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\History;
class BuyController extends Controller
{
    public function buy(Request $request, $id)
    {   
        // バリデーションとデータ整合性のチェック
             
        $history = new History();
         $history->user_id = auth::id(); 
         $history->item_id = $id; 
        $history->save();
            

        if($request) {
            session()->flash('message', '購入しました。');
        } 

            // 成功したら検索画面に遷移
            return redirect('/search/index');
        
    
    }
}
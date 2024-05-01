<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\History;
class BuyController extends Controller
{
    public function buy(Request $request, $id)
    {

    // データを取得する処理
    $items = Item::all();

    // データの保存用の配列を初期化
    $histories = [];
    
    // バリデーションとデータ整合性のチェック
    if ($items){
    foreach ($items as $item) {
        $history = new History();
        $history->name = $item->name; 
        $history->type = $item->type; 
        $history->detail = $item->detail;
        $history->save();

        // データを一時保存
        $histories[] = $history;
    }

    // 一括でデータを保存
    History::insert($histories);
    
    // 成功したら検索画面に遷移
    return view('search.index');
    }else{
        // エラーハンドリング: データが見つからない場合の処理
        // エラーログを記録する
        Log::error('Item not found for id: ' . $id);
        // ユーザーにエラーメッセージを表示する
        return response()->json(['message' => 'Item not found'], 404);
    }
}
}
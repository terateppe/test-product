<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{

    //商品詳細画面を表示
    public function detail($id)
    {
        $item = Item::find($id);
        if($item==false){abort(404);}
        return view('search.detail', compact('item'));
    }
    public function index(Request $request) 
    {
        // リクエストからキーワードと種別の取得
        $keyword = $request->keyword;
      
    
        // キーワードがある場合は検索を行う
        if ($keyword) {
            // 検索条件を設定
            $query = Item::query();
            $query->where('detail', 'LIKE', "%{$keyword}%")
                  ->orWhere('name', 'LIKE', "%{$keyword}%");

            
            // 種別での絞り込みがある場合は追加
           // if ($sortType) {
               // $query->where('type', $sortType);
            //}
    
            // ページネーションを適用
            $items = $query->paginate(10);
        } else {
            // キーワードがない場合は全てのアイテムを取得し、10件ずつ表示しページネーションを適用
            $items = Item::paginate(10);
        }
    
        // 検索結果をビューに渡す
        return view('search.index', compact('items'));
    }
}
<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AccountController::class,'showLogin'])->name('login')->middleware('guest'); // ログイン画面を表示
Route::post('/login', [AccountController::class,'doLogin'])->name('account.doLogin'); // ログイン処理
Route::post('/logout', [AccountController::class,'doLogout'])->name('logout'); // ログアウト処理

route::get('/account/create', [AccountController::class,'create'])->name('account.create')->middleware('guest'); // ユーザー登録画面を表示
route::post('/account/store', [AccountController::class,'store'])->name('account.store'); // ユーザー登録処理

Route::get('/home/{id?}', [App\Http\Controllers\HomeController::class, 'index']); //ホーム画面表示
// ログインしている場合
Route::middleware('auth')->group(function () {
    //Route::get('/home/{id?}', [App\Http\Controllers\HomeController::class, 'index']);

    //商品検索
    Route::get('/search/index', [App\Http\Controllers\SearchController::class, 'index']);
    Route::get('/search/detail/{id}', [App\Http\Controllers\SearchController::class, 'detail']);

    //商品の購入
    Route::post('/search/buy/{id}', [App\Http\Controllers\BuyController::class, 'buy'])->name('buys');//商品の購入処理

    //購入履歴
    Route::get('/item/order_history', [App\Http\Controllers\ItemController::class, 'history'])->name('historys'); //購入履歴画面を表示
    Route::get('/item/detail/{id}', [App\Http\Controllers\ItemController::class, 'details'])->name('details'); // 購入商品の詳細画面
    Route::post('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete'])->name('delete'); //購入商品削除処理
});

    //商品の購入
    //Route::post('/search/buy/{id}', [App\Http\Controllers\BuyController::class, 'buy'])->name('buys');//商品の購入処理

    //購入履歴
    //Route::get('/item/order_history', [App\Http\Controllers\ItemController::class, 'history'])->name('historys'); //購入履歴画面を表示
    //Route::get('/item/detail/{id}', [App\Http\Controllers\ItemController::class, 'details'])->name('details'); // 購入商品の詳細画面

// 管理者の場合
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items'); // 商品登録画面を表示
    Route::get('/item/management', [App\Http\Controllers\ItemController::class, 'management'])->name('managements'); //登録商品一覧画面を表示
    Route::post('/item', [App\Http\Controllers\ItemController::class, 'register'])->name('item'); //商品登録処理
    Route::post('/item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroy'); //商品削除処理
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit'); // 登録商品の編集画面
    Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update'])->name('update'); //登録商品の更新処理

    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);//ユーザー一覧を表示
});

Route::get('/', function () {
    return redirect('/home');
});

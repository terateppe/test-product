<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User; //ユーザーモデルを使用

class UserController extends Controller
{
    /**
     * 利用者一覧を表示する
     */
    public function index(Request $request)
    {
        $users = User::all(); //すべてのユーザーを取得
        return view('users.index', compact('users')); //viewにユーザーを渡す
    }

    /**
     * ユーザー編集画面を表示する
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

}

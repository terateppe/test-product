<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    /**
     * ユーザー更新処理
     */
    public function update(Request $request)
    {
        $ValidatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($request->input('id'));

        // 他の情報も更新
        $user->name = $request->input('name');
        $user->email = $request->input('email');
         // パスワードをハッシュ化して保存
        $user->password = Hash::make($request->input('password'));

        $user->save();

        if($request) {
            session()->flash('message', '更新しました。');
        } 

        return redirect()->route('index');
    }

    
     /**
     * ユーザー削除処理
     */
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect('/login')->with('status', '削除しました');
    }
}

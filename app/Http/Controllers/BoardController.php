<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    //
    public function index (Request $request)
    {
        // ログインしているUserモデルインスタンスを取得
        $user = Auth::user();

        // Eagerローディング（DBへのアクセス数減を目的とする）
        // $items = Board::all();
        $items = Board::with('person')->get();

        $param = [
            'items' => $items,
            'user' => $user,
        ];

        return view('board.index', $param);
    }

    public function add (Request $request)
    {
        return view('board.add');
    }

    public function create (Request $request)
    {
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/board');
    }

    public function edit (Request $request)
    {
        $board = Board::find($request->id);
        return view('board.edit', ['form' => $board]);
    }

    public function update (Request $request)
    {
        // バリデーション
        $this->validate($request, Board::$rules);

        // 編集対象レコードの特定
        $board = Board::find($request->id);

        // 送信されたフォームを取得
        $form = $request->all();

        // CSRF用非表示フィールド「_token」を削除
        unset($form['_token']);

        // インスタンスに値を設定（fill：個々のプロパティをまとめて設定できるメソッド）
        $board->fill($form)->save();

        // リダイレクト
        return redirect('/board');
    }

    public function delete (Request $request)
    {
        $board = Board::find($request->id);
        return view('board.del', ['form' => $board]);
    }

    public function remove(Request $request)
    {
        Board::find($request->id)->delete();
        return redirect('/board');
    }

}

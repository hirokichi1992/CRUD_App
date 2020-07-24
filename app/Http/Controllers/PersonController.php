<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        // 投稿を持つ人
        $hasItems = Person::has('boards')->get();

        // 投稿を持たない人
        $noItems = Person::doesntHave('boards')->get();
        $param = [
            'hasItems' => $hasItems,
            'noItems' => $noItems,
        ];

        return view('person.index', $param);
    }

    // ID検索ページ
    public function find(Request $request)
    {
        return view('person.find', ['input' => ""]);
    }

    // ID検索アクション
    public function search(Request $request)
    {
        $min = $request->input * 1;
        $max = $min + 10;

        $item = Person::ageGreaterThan($min)
            ->ageLessThan($max)
            ->first();

        $param = [
            'input' => $request->input,
            'item' => $item,
        ];

        return view('person.find', $param);
    }

    // 新規作成
    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    // 編集
    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }

    public function update(Request $request)
    {
        // バリデーション
        $this->validate($request, Person::$rules);

        // 編集対象レコードの特定
        $person = Person::find($request->id);

        // 送信されたフォームを取得
        $form = $request->all();

        // CSRF用非表示フィールド「_token」を削除
        unset($form['_token']);

        // インスタンスに値を設定（fill：個々のプロパティをまとめて設定できるメソッド）
        $person->fill($form)->save();

        // リダイレクト
        return redirect('/person');
    }

    // 削除
    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/person');
    }
}

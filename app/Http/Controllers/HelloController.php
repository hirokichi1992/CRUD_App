<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use App\Restdata;
use Validator;
use Illuminate\Support\FACADES\DB;

// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<< EOF
//     <style>
//         body {font-size:16pt; color:#999; }
//         h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
//     </style>
//     EOF;

// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt) {
//     return "<{$tag}>". $txt . "</{$tag}>";
// }

class HelloController extends Controller
{
    // 複数アクションコントローラ
    // public function index () {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Index') . $style . $body .tag('h1', 'Index') . tag('p', 'this is index page') . '<a href="/hello/other"> go to other page</a>' . $end;

    //     return $html;
    // }

    // public function other () {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Other') . $style . $body .tag('h1', 'Other') . tag('p', 'this is other page') . '<a href="/hello"> go to index page</a>' . $end;

    //     return $html;
    // }

    // シングルアクションコントローラ
    //     public function __invoke()
    //     {
    //         return <<< EOF
    //         <html>
    //         <head>
    //         <title>Hello</title>
    //         <style>
    //         body {
    //             font-size:16pt;
    //             text-align:left;
    //             color:#999;
    //         } 
    //         h1 {
    //             font-size:30pt;
    //             text-align:right;
    //             color:#eee;
    //             margin:-15px 0px 0px 0px;
    //         }
    //         </style>
    //         </head>
    //         <body>
    //             <h1>Single Action</h1>
    //             <p>これはシングルアクションコントローラのアクションです。</p>
    //         </body>
    //         </html>
    //     EOF;
    // }

    // public function index(Request $request, Response $response) {
    //     $html = <<<EOF
    //     <html>
    //     <head>
    //         <title>Hello/Index</title>
    //     <style>
    //         body {
    //             font-size:16pt;
    //             color: #999;
    //         }
    //         h1 {
    //             font-size:120pt;
    //             text-align:right;
    //             color:#fafafa;
    //             margin: -50px 0px -120px 0px;
    //         }
    //     </style>
    //     </head>
    //     <body>
    //         <h1>Hello</h1>
    //         <h3>Request</h3>
    //         <h4>REQUEST URL : {$request->url()}</h4>
    //         <h4>REQUEST FULL URL : {$request->fullurl()}</h4>
    //         <h4>REQUEST PATH : {$request->path()}</h4>
    //         <pre>{$request}</pre>
    //         <h3>Response</h3>
    //         <pre>{$response}</pre>
    //     </body>
    //     </html>
    //     EOF;

    //     $response->setContent($html);
    //     return $response->content();
    // }

    public function index(Request $request)
    {
        // カスタムバリデータの作成
        // $validator = Validator::make($request->query(), [
        //     'ID' => 'required',
        //     'PASS' => 'required',
        // ]);

        // カスタムバリデータに引っ掛かった時の処理（リダイレクト＋エラーメッセージ＋入力情報）
        // if ($validator->fails()) {
        //     $msg = 'クエリーに問題があります。';
        // } else {
        //     $msg = 'ID, PASSを受け付けました。フォームを入力下さい。';
        // }

        // クライアントからのクッキーの受け取り
        // if ($request->hasCookie('msg')) {
        //     $msg = 'Cookie: ' . $request->cookie('msg');
        // } else {
        //     $msg = '※クッキーは存在しません。';
        // }

        // DBクラスを利用する
        // if (isset($request->id)) {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }

        //クエリビルダを利用する
        $items = DB::table('people')->orderBy('age', 'asc')->get();

        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {

        // フォームリクエストを使わず個別にバリデーションチェックする時の記述方法
        // $validate_rule = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric|between:0,150',
        // ];

        // $this->validate($request, $validate_rule);

        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];

        // $messages = [
        //     'name.required' => '名前は必ず入力して下さい。',
        //     'mail.email' => 'メールアドレスが必要です。',
        //     'age.min' => '年齢を0歳以上で記入下さい。',
        //     'age.max' => '年齢を200歳以下で入力下さい。',
        // ];

        // カスタムバリデータの作成
        // $validator = Validator::make($request->all(), $rules, $messages);

        // 条件に応じたルールの追加（0歳以上）→ 真偽値を返し、falseの場合ルールを追加する
        // $validator->sometimes('age', 'min:0', function ($input) {
        //     return !is_int($input->age);
        // });

        // 条件に応じたルールの追加（200歳以下）→ 真偽値を返し、falseの場合ルールを追加する
        // $validator->sometimes('age', 'max:200', function ($input) {
        //     return !is_int($input->age);
        // });

        // カスタムバリデータに引っ掛かった時の処理（リダイレクト＋エラーメッセージ＋入力情報）
        // if ($validator->fails()) {
        //     return redirect('/hello')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // バリデーション設定
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);

        // バリデーション後のmsgを保存
        $msg = $request->msg;

        // Responseオブジェクトを用意し、Viewテンプレートの設定と値をresponseインスタンスへ渡す
        $response = response()->view(
            'hello.index',
            [
                'msg' => '「' . $msg . '」をクッキーに保存しました。'
            ]
        );

        // responseインスタンスへクッキーを設定する：cookie(キー、値、分数)
        $response->cookie('msg', $msg, 100);

        return $response;
    }

    public function add()
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        // DBクラスを利用する
        // $param = [
        //     'name' => $request->name,
        //     'mail' => $request->mail,
        //     'age' => $request->age,
        // ];

        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);

        // クエリビルダを利用する
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::table('people')->insert($param);

        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        // DBクラスを利用する
        // $param = [
        //     'id' => $request->id,
        // ];
        // $item = DB::select('select * from people where id = :id', $param);

        // クエリビルダを利用する
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        // DBクラスを利用する
        // $param = [
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'mail' => $request->mail,
        //     'age' => $request->age,
        // ];

        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);

        // クエリビルダを利用する
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::table('people')
            ->where('id', $request->id)
            ->update($param);

        return redirect('/hello');
    }

    public function del(Request $request)
    {
        // DBクラスを利用する
        // $param = [
        //     'id' => $request->id
        // ];

        // $item = DB::select('select * from people where id = :id', $param);

        // クエリビルダを利用する
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();

        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        // DBクラスを利用する
        // $param = [
        //     'id' => $request->id,
        // ];

        // DB::delete('delete from people where id = :id', $param);

        // クエリビルダを利用する
        DB::table('people')
            ->where('id', $request->id)
            ->delete();

        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();

        return view('hello.show', ['items' => $items]);
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    // session_get
    public function ses_get (Request $request)
    {
        $ses_data = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $ses_data]);
    }

    // session_post
    public function ses_put (Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('/hello/session');
    }
}

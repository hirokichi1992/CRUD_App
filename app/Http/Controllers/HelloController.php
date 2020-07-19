<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;

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
        $validator = Validator::make($request->query(), [
            'ID' => 'required',
            'PASS' => 'required',
        ]);

        // カスタムバリデータに引っ掛かった時の処理（リダイレクト＋エラーメッセージ＋入力情報）
        if ($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID, PASSを受け付けました。フォームを入力下さい。';
        }
        return view('hello.index', ['msg' => $msg]);
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

        // カスタムバリデータの作成
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);

        // カスタムバリデータに引っ掛かった時の処理（リダイレクト＋エラーメッセージ＋入力情報）
        if ($validator->fails()) {
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}

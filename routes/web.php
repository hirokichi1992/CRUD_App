<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# use Illuminate\Routing\Route;

use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// 必須パラメータ
// {msg}を指定しないとエラーになる
#Route::get('hello/{msg}', function( $msg  ) {


// 任意パラメータ
// Route::get('hello/{msg?}', function( $msg = 'no messages' ) {
//     $html = <<<EOF
//     <html>
//         <head>
//             <title>Test page</title>
//         </head>
//         <body>
//             <h1>I'm hiroki kanda. Nice to meet to you. </h1>
//             <p>$msg</p>
//             <p>これはサンプルで作ったページです。</p>
//         </body>
//     </html>
//     EOF;

//     return $html;
// });

// 複数アクションコントローラ
// Route::get('hello', 'HelloController@index');
// Route::get('hello/other', 'HelloController@other');

// シングルアクションコントローラ
//Route::get('hello', 'HelloController');

// 個別にミドルウェアを呼び出す場合
// Route::get('hello', 'HelloController@index')->middleware(HelloMiddleware::class);

// グループミドルウェアを呼び出す場合
Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

// 新規作成
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

// 更新
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

// 削除
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

// showメソッド（クエリビルダ）
Route::get('hello/show', 'HelloController@show');

// Personモデル
Route::get('person', 'PersonController@index');

//検索
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

// 新規作成（Eloquant）
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

// 更新（Eloquant）
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

// 削除（Eloquant）
Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

// Route::get('hello', function () {
//     return view('hello.index');
// });
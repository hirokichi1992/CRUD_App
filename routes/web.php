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

use App\Http\Controllers\BoardController;
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
//Route::get('hello', 'HelloController@index')->middleware('helo');

// トップページ
Route::get('hello', 'HelloController@index')->middleware('auth');
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

// 掲示板トップ
Route::get('board', 'BoardController@index');

// 掲示板投稿ページ
Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

// 掲示板更新ページ
Route::get('board/edit', 'BoardController@edit');
Route::post('board/edit', 'BoardController@update');

// 掲示板削除ページ
Route::get('board/del', 'BoardController@delete');
Route::post('board/del', 'BoardController@remove');

// Restapp
Route::resource('rest', 'RestappController');

// Restapp新規データ登録画面
Route::get('hello/rest', 'HelloController@rest');

// Session
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

// Route::get('hello', function () {
//     return view('hello.index');
// });

// カスタムログイン
Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');

// Auth自動生成
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

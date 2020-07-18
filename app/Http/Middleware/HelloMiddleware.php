<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // コントローラのアクション実行後のレスポンスを$responseに格納
        $response = $next($request);

        // $responseからHTMLソースコードのテキストを取得する
        $content = $response->content();

        // <middleware>というタグを正規表現で置換する
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);

        // レスポンスにコンテンツを設定する
        $response->setContent($content);

        // returnする
        return $response;
    }
}

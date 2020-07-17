<?php
namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer
{
    public function compose(View $view)
    {
        // ビューの名前を'view_message'に設定
        $view->with('view_message', 'this view is "'. $view->getName().'"!!');
    }
}
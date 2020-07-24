<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    // テーブル名の指定（Eloquantではテーブル名はモデル名の複数形になっているが今回はrestdataという単数形複数形が分かりにくい名前なので指定している）
    protected $table = 'restdata';
    protected $guarded = ['id'];

    public static $rules = [
        'message' => 'required',
        'url' => 'required',
    ];

    public function getData()
    {
        return $this->id . ':' . $this->message . '(' . $this->url . ')';
    }
}

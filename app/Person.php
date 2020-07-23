<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;
use Illuminate\Contracts\Auth\Guard;

class Person extends Model
{
    // 'id'はプライマリーキーなのでガードしておく（レコード追加時のid指定を不要にする）
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    //
    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    // has one結合
    // public function board()
    // {
    //     return $this->hasone('App\Board');
    // }

    // has many結合
    public function boards()
    {
        return $this->hasmany('App\Board');
    }    

    // ローカルスコープ（name検索）
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    // グローバルスコープ(ageが20以上のレコードのみ取得)
    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope('age', function(Builder $builder) {
        //     $builder->where('age', '>', 20);
        // });

        // Scopeクラスの利用（複数モデルやその他プロジェクトで使用可能）
        //static::addGlobalScope(new ScopePerson);
    }
}

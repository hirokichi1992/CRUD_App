<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $guarded = ['id'];

    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    ];

    public function getData()
    {
        return $this->id . ': ' . $this->title . ' (' . $this->person->name . '(' . $this->person->age . ')' . ')'.' ->  (id : title(name (age)))';
    }

    public function person()
    {
        // belongs to結合
        return $this->belongsTo('App\Person');
    }
}

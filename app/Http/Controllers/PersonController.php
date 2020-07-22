<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    // ID検索ページ
    public function find(Request $request)
    {
        return view('person.find', ['input' => ""]);
    }

    // ID検索アクション
    public function search(Request $request)
    {
        $item = Person::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item,
        ];

        return view('person.find', $param);
    }
}
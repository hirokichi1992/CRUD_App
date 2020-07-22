<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['name' => 'ichiro','mail' => 'taro@yamada.jp','age' => 15,],
            ['name' => 'jiro','mail' => 'jiro@yamada.jp','age' => 65,],
            ['name' => 'saburo','mail' => 'saburo@yamada.jp','age' => 51,],
            ['name' => 'siro','mail' => 'siro@yamada.jp','age' => 23,],
            ['name' => 'goro','mail' => 'goro@yamada.jp','age' => 1,],
            ['name' => 'rokuro','mail' => 'rokuro@yamada.jp','age' => 90,],
            ['name' => 'nanaro','mail' => 'nanaro@yamada.jp','age' => 120,],
            ['name' => 'hachiro','mail' => 'hachiro@yamada.jp','age' => 87,],
            ['name' => 'kuro','mail' => 'kuro@yamada.jp','age' => 33,],            
        ];

        foreach($params as $param){
            DB::table('people')->insert($param);
        }

    }
}

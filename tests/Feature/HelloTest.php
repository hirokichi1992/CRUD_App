<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Person;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     use DatabaseMigrations;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHello()
    {
        $this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = "Hello";
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);
    }

    public function testHelloWeb()
    {
        // '/'にアクセスしたときステータスコードが「200」（OK）
        $response = $this->get('/');
        $response->assertStatus(200);

        // '/hello'にアクセスしたときステータスコードが「302」(ページは存在するがアクセスできない → middleware(auth)設定のため)
        $response= $this->get('/hello');
        $response->assertStatus(302);

        // ユーザーインスタンスを生成して、'/hello'にアクセスしたときステータスコードが「200」(OK) 
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertStatus(200);

        // '/no_route'にアクセスしたときステータスコードが「404」(ページが存在しない)
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }

    public function testHelloDb()
    {
        // ダミーで利用するデータ(assertDatabaseHas()で存在することを確認するために使用する)
        factory(User::class)->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);

        // ダミーで利用するデータ(UserFactory.phpから10個インスタンスを生成する)
        factory(User::class, 10)->create();

        // 最初に作ったUserクラスのダミーデータがDBのusersテーブルに存在するか確認
        $this->assertDatabaseHas('users', [
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);


        // ダミーで利用するデータ(assertDatabaseHas()で存在することを確認するために使用する)
        factory(Person::class)->create([
            'name' => 'XXX',
            'mail' => 'YYY@CCC.com',
            'age' => '142',
        ]);

        // ダミーで利用するデータ(UserFactory.phpから10個インスタンスを生成する)
        factory(Person::class, 10)->create();

        // 最初に作ったPersonクラスのダミーデータがDBのpeopleテーブルに存在するか確認
        $this->assertDatabaseHas('people', [
            'name' => 'XXX',
            'mail' => 'YYY@CCC.com',
            'age' => '142',
        ]);
    }
}

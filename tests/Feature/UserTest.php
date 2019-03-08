<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{

  use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUser()
    {
      //以下コメントアウトしてる箇所はルート情報を修正したのち再度テストする
        $this->assertTrue(true);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/admin');
        $response->assertStatus(404);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(404);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

        // factory(User::class)->create([
        //   'name' => 'AAA',
        //   'email' => 'BBB@CCC.COM',
        //   'password' => 'ABCABC',
        // ]);
        // factory(User::class, 10)->create();
        //
        // $this->assertDatabaseHas('users', [
        //   'name' => 'AAA',
        //   'email' => 'BBB@CCC.COM',
        //   'password' => 'ABCABC',
        // ]);

    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestResponse;

class ExampleTest extends TestCase
{
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$this->visit('trangchu')
		->click('Giới thiệu')
		->seePageIs('/gioithieu');
	}

	public function testNewUserRegistration()
	{
		$this->visit('/dangky')
		->type('Taylor', 'name')
		->type('taylor@gmail.com','email')
		->type('123','password')
		->type('123','password1')
		->press('Đăng ký')
		->seePageIs('/dangky');
	}

	public function testAuthentication()
	{
		$user = factory(App\User::class)->create();

		$this->actingAs($user)
		->withSession(['foo' => 'bar'])
		->visit('trangchu')
		->see(''.$user->name);
	}

	public function testDisabling_Middleware()
	{
		$this->withoutMiddleware();

		$this->visit('admin/theloai/danhsach')
		->see('Admin Area');
	}

	public function testApplication()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->status());
	}

	

}

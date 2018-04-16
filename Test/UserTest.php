<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
    // Make call to application...

    	$this->seeInDatabase('users', [
    		'email' => 'tuyettruong@gmail.com'
    		]);
    }

    public function testCreatDatabase()
    {
    	$user = factory(App\User::class)->create([
    		'name' => 'Abigail123',
    		'email'=>'123ab@gmail.com',
    		]);
    }

    public function testRelationships(){
    	$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($u) {
                $u->comment()->save(factory(App\Comment::class)->make());
            });

    }

   
}

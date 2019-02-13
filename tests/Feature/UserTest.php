<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     * @group users
     * @test
     */
    public function viewUsers()
    {
    	$user=factory(User::class)->create();
    	$this->actingAs($user);

    	$this->get('usuario.index')->assertStatus(200);
    }
}

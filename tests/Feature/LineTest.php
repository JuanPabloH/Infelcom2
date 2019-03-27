<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LineTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_view_create_line(){
		$user = User::find(1);		
        $response = $this->actingAs($user)                         
                         ->get(route('lineaInvestigacion.create'));
		$this->assertAuthenticatedAs($user);                        				 		
 		$response->assertViewIs('lineaInvestigacion.create'); 
	}
  

    public function test_create_new_line(){   	
    	
        $response = $this->post(route('lineaInvestigacion.store'),[                         	
                         	'name'=>'lineaTest',                         	
                         ]);
        $response->assertRedirect('/lineaInvestigacion'); 
        $response->assertSessionHasNoErrors();	
        $response->assertSessionHas(['message'=>'Registro exitoso']);

        $this->assertDatabaseHas('line_of_investigations',[
    		'name'=>'lineaTest'
    	]);
    }
}

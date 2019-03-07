<?php

namespace Tests\Feature\Admin;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{

	public function test_index(){

		$user = User::find(1);		
        $response = $this->actingAs($user)                         
                         ->get('/usuario');
		$this->assertAuthenticatedAs($user);                        				 		
 		$response->assertViewIs('usuario.index'); 		

	}
	
	public function test_view_create(){
		$user = User::find(1);		
        $response = $this->actingAs($user)                         
                         ->get(route('usuario.create'));
		$this->assertAuthenticatedAs($user);                        				 		
 		$response->assertViewIs('usuario.create'); 
	}


	public function test_create_new_user(){   	
    	
        $response = $this->post(route('usuario.store'),[
                         	'document'=>'123456',
                         	'name'=>'newname',
                         	'last_name'=>'lastname',
                         	'email'=>'email@ejemplo.com',
                         	'password'=>'secret',
                         ]);
        $response->assertRedirect('/usuario'); 
        $response->assertSessionHasNoErrors();	
        $response->assertSessionHas(['message'=>'Usuario registrado con exito']);

        $this->assertCredentials([
        	'document'=>'123456',
            'name'=>'newname',
            'last_name'=>'lastname',
            'email'=>'email@ejemplo.com',
            'password'=>'secret',
        ]);
    }

    public function test_edit_user(){
    	$user = factory(User::class)->create([ 
    		'document'=>'123456',   		
            'name'=>'name',
            'last_name'=>'lastname',
            'email'=>'email@ejemplo.com',           
            'password'=>'secret',
    	]);		
    	
    	$response=$this->put(route('usuario.update',$user->id),[
    		'document'=>'123456',
            'name'=>'editname',
            'last_name'=>'lastname',
            'email'=>'email@ejemplo.com',
            'password'=>'secret',
    	]);
    	$response->assertRedirect('/home');
    	$response->assertSessionHasNoErrors();	
        $response->assertSessionHas(['message'=>'Usuario Actualizado Correctamente']);
    	$this->assertCredentials([
        	'document'=>'123456',
            'name'=>'editname',
            'last_name'=>'lastname',
            'email'=>'email@ejemplo.com',
            'password'=>'secret',
        ]);
        
    }

    public function test_delete_user(){
    	$user= factory(User::class)->create([ 
    		'document'=>'123456',   		            
    	]);	
    	$response=$this->delete(route('usuario.destroy',$user->id));
    	$response->assertRedirect('/usuario'); 
    	$this->assertDatabaseMissing('users',[
    		'id'=>$user->id
    	]);
    }

   /** 	public function test_add_user(){
		$user = User::find(1);
		$response=$this->ActingAs($user)
		->get('usuario/create')
		->type('321456','document')
		->type('NombreEj','name')
		->type('ApellidoEj','last_name')
		->type('ej@ejemplo.com','email')
		->type('secret','password')
		->press('Registrar');
		

	}*/

	public function test_welcome_message(){
		$this->visit('/')->see('Infelcom');
	}
  
}

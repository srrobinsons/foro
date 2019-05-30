<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class CreatePostsTest extends TestCase
{
	use DatabaseTransactions;

	public function test_a_user_create_a_post()
	{
		$this->withoutExceptionHandling();
		//---------teniendo estos datos
		$title = 'Esta es una pregunta';
		$content = 'Este es el contenido';

		//$this->actingAs($this->defaultUser()); //creando el usuario
		//$user = factory(\App\User::class)->create();
		$user = factory(User::class)->create();
		$this->actingAS($user);
		//---------cuando creo el post en el foro
		//$this->visit(route('posts.create'))
		//		->type($title, 'title')
		//	 	->type($content, 'content')
		//	 ->press('Publicar');		
                $this->from(route('posts.create'))
                        ->post(route('posts.store'),[
                        'title' => $title,
                        'content'=> $content 			 
                        ]);
		//---------Deberia ver eso en la base de datos
		//$this->seeInDatabase('posts', [
		//	'title' => $title,
		//	'content' => $content,
		//	'pending' => true,
		
                $this->assertDatabaseHas('posts',[
                    'title' => $title,
                    'content'=> $content,
                    //'user_id'=> $user_id,
         ]);		
		// el usuario es redirigido al post
		//$this->seeInElement('h1', $title);
        //$this->assertSee($title);
	}
}
<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
//class ExampleTest extends FeatureTestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {   
        $user = factory(\App\User::class)->create([
                'name' => 'Pepe Argento',
                'email'=> 'pepe@mail.com',
        ]);

        $response = $this->actingAs($user, 'api')  //para ver si nicio sesion
                        ->get('api/user')
                        ->assertSee('Pepe Argento')
                        ->assertSee('pepe@mail.com');

        $response->assertStatus(200);
    }
}

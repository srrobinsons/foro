<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    /**
     *@var \App\User
     */
    protected $defaultUser;

    public function defaultUser()
    {
    	if ($this->defaultUser){
    		return $this->defaultUser;
    	}
    	return $this->defaultUser = factory(User::class)->create();
    }
}

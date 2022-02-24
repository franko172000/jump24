<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\BaseTestCase;

class UserServiceTest extends BaseTestCase
{

    public function test_service_can_pull_data()
    {
        $mock = $this->mockResponse();
        //fetch data
        $this->fakeRequest();

        resolve(UserService::class)->pullUsers();
        $users = User::all();
        $this->assertEquals($mock['total'], $users->count());
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\BaseTestCase;
use Tests\TestCase;

class UserPullCommandTest extends BaseTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_pull_command()
    {
        $this->fakeRequest();
        $mock = $this->mockResponse();

        Artisan::call('external-users:pull');

        $users = User::all();
        $this->assertCount(count($mock['total']), $users);
    }
}

<?php

namespace Tests;

use Illuminate\Support\Facades\Http;

class BaseTestCase extends TestCase
{
    protected function fakeRequest()
    {
        $mock = $this->mockResponse();
        //fetch data
        Http::fake([
            config('system.external_user_endpoint') => Http::sequence()
                ->push($mock),
        ]);
    }

    /**
     * Mock 3rd party response
     * @return array
     */
    protected function mockResponse(): array
    {
        $data = file_get_contents(__DIR__ . 'mock/user.json');
        return json_decode($data, true);
    }
}

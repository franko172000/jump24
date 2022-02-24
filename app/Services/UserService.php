<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserService
{
    public function __construct()
    {
        $this->endpoint = config('system.external_user_endpoint');
    }
    public function pullUsers(int $page = 1){
        $response = Http::get($this->endpoint . "?page=$page");
        $users = json_decode($response->body(), true);
        while($users['total_pages'] >= $page){
            foreach ($users['data'] as $user){
                User::updateOrCreate(['email' => $user['email']],[
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'],
                    'avatar' => $user['avatar']
                ]);
            }
            $page++;
            $this->pullUsers($page);
        }
    }
}

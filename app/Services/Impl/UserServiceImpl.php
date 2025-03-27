<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private array $users = [
        "odis" => "odisganteng"
    ];

    public function login(string $name, string $password): bool
    {
        if (!isset($this->users[$name])) {
            return false;
        }

        $correctPassword = $this->users[$name];
        return $password == $correctPassword;
    }
}

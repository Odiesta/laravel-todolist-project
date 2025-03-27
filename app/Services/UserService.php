<?php

namespace App\Services;

interface UserService
{
    public function login(string $name, string $password): bool;
}

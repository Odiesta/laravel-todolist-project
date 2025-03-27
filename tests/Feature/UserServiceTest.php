<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{

    private UserService $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        assertTrue($this->userService->login("odis", "odisganteng"));
    }

    public function testLoginUserNotFound()
    {
        assertFalse($this->userService->login("odoy", "ganteng"));
    }

    public function testLoginWrongPassword()
    {
        assertFalse($this->userService->login("odis", "shandikarona"));
    }
}

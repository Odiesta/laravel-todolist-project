<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLogin()
    {
        $this->get("login")
            ->assertSeeText("Login");
    }

    public function testLoginSuccess()
    {
        $this->post("/login", [
            "name" => "odis",
            "password" => "odisganteng"
        ])->assertRedirect("/");
    }

    public function testLoginEmpty()
    {
        $this->post("/login")->assertSeeText("Username or password is empty");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [
            "name" => "odoy",
            "password" => "ganteng"
        ])->assertSeeText("Username or password is incorrect");
    }
}

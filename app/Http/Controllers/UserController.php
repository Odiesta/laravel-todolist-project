<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        return response()->view("login", [
            "title" => "Login"
        ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $username = $request->input("name");
        $password = $request->input("password");

        if (empty($username) || empty($password)) {
            return response()->view("login", [
                "title" => "Login",
                "error" => "Username or password is empty"
            ]);
        }

        if ($this->userService->login($username, $password)) {
            $request->session()->put("user", $username);
            return redirect('/');
        }

        return response()->view("login", [
            "title" => "Login",
            "error" => "Username or password is incorrect"
        ]);
    }

    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget("user");
        return redirect("/");
    }
}

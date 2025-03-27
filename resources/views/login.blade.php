<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <div>
        @if(isset($error))
        <div class="pt-4 px-4">
            <p class="error bg-red-400 text-white p-4">{{$error}}</p>
        </div>
        @endif
        <div class="flex justify-around max-w-full ">
            <h1 class="text-2xl mt-10">Selamat datang di Todolist Guest</h1>
            <div class="login-card px-8 py-2 border-2 border-slate-100 mt-10 w-full max-w-xl mx-4">
                <form action="/login" method="POST">
                    @csrf
                    <h1 class="text-center font-bold text-3xl">Login</h1>
                    <div class="my-4">
                        <label for="name" class="block text-xl mb-2">Username</label>
                        <input type="text" name="name" id="name" placeholder="Enter username" class="block border-2 px-4 py-2 border-slate-200 w-full">
                    </div>
                    <div class="my-4">
                        <label for="password" class="block text-xl mb-2">Password</label>
                        <input type="password" name="password" id="password" placeholder="password" class="block border-2 px-4 py-2 border-slate-200 w-full">
                    </div>
                    <div class="my-4">
                        <button class="bg-blue-500 w-full py-2 text-white rounded-md cursor-pointer hover:bg-blue-600">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

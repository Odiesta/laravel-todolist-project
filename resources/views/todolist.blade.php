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
            <p class="error bg-red-400 text-white p-4">A simple danger alert—check it out!</p>
        </div>
        @endif

        <div class="text-right m-4">
            <form action="/logout" method="POST">
                @csrf
                <button class="bg-red-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-red-600">Sign Out</button>
            </form>
        </div>
        <div class="flex justify-around max-w-full ">
            <h1 class="text-2xl mt-10">Selamat datang di Todolist</h1>
            <div class="login-card px-8 py-2 border-2 border-slate-100 mt-10 w-full max-w-xl mx-4">
                <form action="/todolist" method="POST">
                    @csrf
                    <h1 class="text-center font-bold text-3xl">Add Todo</h1>
                    <div class="my-4">
                        <label for="todo" class="block text-xl mb-2">Todo</label>
                        <input type="text" name="todo" id="todo" placeholder="Enter todo" class="block border-2 px-4 py-2 border-slate-200 w-full">
                    </div>
                    <div class="my-4">
                        <button class="bg-blue-500 w-full py-2 text-white rounded-md cursor-pointer hover:bg-blue-600">Add todo</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-full flex justify-center">
            <table class="table-auto max-w-xl w-full border-spacing-4 ">
                <thead class="">
                    <tr class="px-10">
                        <th class="py-2">Id</th>
                        <th class="">Todo</th>
                        <th class="">Delete</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($todolist as $todo)
                    <tr class="border-t-2">
                        <td class="">{{$todo["id"]}}</td>
                        <td class="">{{$todo["todo"]}}</td>
                        <td class="py-2 px-2">
                            <form action="/todolist/{{$todo["id"]}}/delete" method="POST">
                                @csrf
                                <button class="bg-red-500 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-red-600">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

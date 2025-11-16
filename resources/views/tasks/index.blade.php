<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-8 px-4">

<div class="max-w-2xl mx-auto">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Add new Task</h1>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <form class="flex flex-col flex-1 gap-2" action="{{route('tasks.store')}}" method="POST">
            @csrf
            <input
                type="text"
                name="title"
                placeholder="Title of task"
                class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-black"
            >
            <input
                type="text"
                name="description"
                placeholder="Description of task"
                class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-black"
            >
            @if($errors->any())
            <p class="text-red-500">All fields must be filled</p>
            @endif
            <button
                type="submit"
                class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition duration-200 shadow-md hover:shadow-lg"
            >
                Add Task
            </button>
        </form>

    </div>


    <!-- Tasks List -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
    @foreach($tasks as $task)
        <!-- Task Item 1 - Active -->
        <div class="border-b border-gray-200 p-5 hover:bg-gray-50 transition">
            <a href="{{route('tasks.show',$task->id)}}">
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">{{$task->title}}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{$task->description}}</p>
                </div>
                <form action="{{route('tasks.delete',$task->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="p-2 text-red-600 hover:bg-red-50 cursor-pointer rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>
            </a>
        </div>

        @endforeach()
    </div>


   {{-- <!-- Footer Stats -->
    <div class="mt-6 text-center text-gray-600">
        <p class="text-sm">3 tasks remaining · 2 completed today</p>
    </div>--}}
</div>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Details</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen py-8 px-4">

<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{route('tasks.index')}}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Tasks
        </a>
    </div>

    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Task Details</h1>
    </div>

    <!-- Task Details Card -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-600 mb-2">Title</label>
            <h2 class="text-2xl font-bold text-gray-800">{{$task->title}}</h2>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-600 mb-2">Description</label>
            <p class="text-gray-700 text-lg">{{$task->description}}</p>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-600 mb-2">Created</label>
            <p class="text-gray-700">{{$task->created_at->format('M d, Y \a\t H:i')}}</p>
        </div>

        @if($task->updated_at != $task->created_at)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-600 mb-2">Last Updated</label>
                <p class="text-gray-700">{{$task->updated_at->format('M d, Y \a\t H:i')}}</p>
            </div>
        @endif
    </div>

    <!-- Edit Task Form -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Edit Task</h3>
        <form class="flex flex-col flex-1 gap-2" action="{{route('tasks.update', $task->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input
                type="text"
                name="title"
                value="{{$task->title}}"
                placeholder="Title of task"
                class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-black"
            >
            <input
                type="text"
                name="description"
                value="{{$task->description}}"
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
                Update Task
            </button>
        </form>
    </div>

    <!-- Delete Task -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Danger Zone</h3>
        <p class="text-gray-600 mb-4">Once you delete a task, there is no going back. Please be certain.</p>
        <form action="{{route('tasks.delete', $task->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200 shadow-md hover:shadow-lg"
                onclick="return confirm('Are you sure you want to delete this task?')"
            >
                Delete Task
            </button>
        </form>
    </div>
</div>

</body>
</html>

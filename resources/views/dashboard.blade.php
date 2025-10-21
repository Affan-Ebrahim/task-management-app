<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: 600; color: #2d3748;">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: calc(100vh - 100px);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('tasks.create') }}"
                   class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                   style="background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); box-shadow: 0 4px 6px rgba(79, 172, 254, 0.3); transition: all 0.3s ease; border: none; font-weight: 600; letter-spacing: 0.5px;">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Create Task
                </a>
            </div>

            @if ($tasks->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tasks->sortByDesc('created_at') as $task)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between"
                             style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; border-left: 4px solid #4facfe;">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900" style="font-size: 1.25rem; font-weight: 600; color: #2d3748; margin-bottom: 8px; line-height: 1.4;">
                                    {{ $task->title }}
                                </h3>
                                <p class="mt-2 text-gray-600 text-sm line-clamp-3" style="color: #718096; font-size: 0.875rem; line-height: 1.5; margin-top: 8px;">
                                    {{ $task->description }}
                                </p>
                            </div>
                            <div class="mt-4 flex justify-end space-x-2">
                                <a href="{{ route('tasks.show', $task->id) }}"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                   style="background-color: #edf2f7; color: #4a5568; border-radius: 6px; padding: 6px 12px; font-weight: 500; transition: all 0.2s ease; text-decoration: none;">
                                    View
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                   class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                   style="background-color: #bee3f8; color: #2b6cb0; border-radius: 6px; padding: 6px 12px; font-weight: 500; transition: all 0.2s ease; text-decoration: none;">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                            style="background-color: #fed7d7; color: #c53030; border-radius: 6px; padding: 6px 12px; font-weight: 500; transition: all 0.2s ease; cursor: pointer; border: none;">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
                    <div class="p-12 text-center" style="padding: 3rem; text-align: center;">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="height: 3rem; width: 3rem; color: #a0aec0; margin: 0 auto;">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900" style="margin-top: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #2d3748;">
                            No tasks yet!
                        </h3>
                        <p class="mt-1 text-sm text-gray-500" style="margin-top: 0.25rem; font-size: 0.875rem; color: #718096;">
                            Get started by creating a new task.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
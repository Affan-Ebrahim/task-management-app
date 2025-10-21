<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Inter', system-ui, sans-serif; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: calc(100vh - 80px); padding: 2rem 0;">

        @if(session('success'))
            <div class="mb-4 rounded-md bg-green-50 p-4 text-green-800" style="background: linear-gradient(to right, #d1fae5, #ecfdf5); border: 1px solid #a7f3d0; border-radius: 12px; padding: 1rem; color: #065f46; box-shadow: 0 4px 6px -1px rgba(6, 95, 70, 0.1); margin-bottom: 1rem;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-4" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <a href="{{ route('tasks.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none; border-radius: 10px; padding: 0.75rem 1.5rem; color: white; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3); transition: all 0.3s ease; position: relative; overflow: hidden;">
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create New Task
            </a>

            <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center space-x-2" style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
                <input type="text" name="search" placeholder="Search tasks..." value="{{ request('search') }}"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="border: 1px solid #d1d5db; border-radius: 8px; padding: 0.5rem 0.75rem; font-size: 0.875rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: all 0.2s ease; min-width: 200px; background: white;" />
                
                <select name="status"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="border: 1px solid #d1d5db; border-radius: 8px; padding: 0.5rem 0.75rem; font-size: 0.875rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: all 0.2s ease; background: white; cursor: pointer;">
                    <option value="">All Statuses</option>
                    <option value="pending" @selected(request('status') == 'pending')>Pending</option>
                    <option value="in-progress" @selected(request('status') == 'in-progress')>In Progress</option>
                    <option value="completed" @selected(request('status') == 'completed')>Completed</option>
                </select>
                
                <select name="sort_by"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="border: 1px solid #d1d5db; border-radius: 8px; padding: 0.5rem 0.75rem; font-size: 0.875rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: all 0.2s ease; background: white; cursor: pointer;">
                    <option value="latest" @selected(request('sort_by', 'latest') == 'latest')>Sort by Latest</option>
                    <option value="oldest" @selected(request('sort_by') == 'oldest')>Sort by Oldest</option>
                    <option value="title_asc" @selected(request('sort_by') == 'title_asc')>Sort by Title (A-Z)</option>
                    <option value="title_desc" @selected(request('sort_by') == 'title_desc')>Sort by Title (Z-A)</option>
                </select>
                
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    style="background: linear-gradient(135deg, #4b5563 0%, #374151 100%); border: none; border-radius: 8px; padding: 0.5rem 1rem; color: white; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    Filter
                </button>
                
                @if (request('search') || request('status') || request('sort_by'))
                    <a href="{{ route('tasks.index') }}" 
                       style="color: #6b7280; font-size: 0.875rem; text-decoration: none; transition: color 0.2s ease; border-bottom: 1px solid #d1d5db; padding-bottom: 1px;">
                        Clear Filters
                    </a>
                @endif
            </form>
        </div>

        @if($tasks->count())
            <div class="overflow-x-auto bg-white shadow rounded-lg" style="background: white; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); overflow: hidden;">
                <table class="min-w-full divide-y divide-gray-200" style="min-width: 100%; border-collapse: collapse;">
                    <thead class="bg-gray-50" style="background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Task</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; letter-spacing: 0.05em; text-transform: uppercase; border-bottom: 1px solid #e5e7eb;">Created</th>
                            <th scope="col" class="relative px-6 py-3" style="padding: 1rem 1.5rem; text-align: right; border-bottom: 1px solid #e5e7eb;">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" style="background: white;">
                        @foreach($tasks as $task)
                            <tr style="transition: background-color 0.2s ease; border-bottom: 1px solid #f3f4f6;">
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 1rem 1.5rem; white-space: nowrap; border-bottom: 1px solid #f3f4f6;">
                                    <div class="text-sm font-medium text-gray-900" style="font-size: 0.875rem; font-weight: 600; color: #111827; margin-bottom: 0.25rem;">{{ $task->title }}</div>
                                    <div class="text-sm text-gray-500" style="font-size: 0.875rem; color: #6b7280;">{{ Str::limit($task->description, 60) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" style="padding: 1rem 1.5rem; white-space: nowrap; border-bottom: 1px solid #f3f4f6;">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : ($task->status === 'in-progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}"
                                          style="padding: 0.25rem 0.75rem; display: inline-flex; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; text-transform: capitalize;
                                          @if($task->status === 'completed')
                                            background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; border: 1px solid #a7f3d0;
                                          @elseif($task->status === 'in-progress')
                                            background: linear-gradient(135deg, #fef3c7, #fde68a); color: #92400e; border: 1px solid #fde68a;
                                          @else
                                            background: linear-gradient(135deg, #f3f4f6, #e5e7eb); color: #374151; border: 1px solid #e5e7eb;
                                          @endif">
                                        {{ str_replace('-', ' ', $task->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" title="{{ $task->created_at->format('Y-m-d H:i:s') }}" style="padding: 1rem 1.5rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280; border-bottom: 1px solid #f3f4f6;">
                                    {{ $task->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2" style="padding: 1rem 1.5rem; white-space: nowrap; text-align: right; font-size: 0.875rem; font-weight: 500; border-bottom: 1px solid #f3f4f6;">
                                    <a href="{{ route('tasks.edit', $task) }}"
                                        class="text-indigo-600 hover:text-indigo-900 font-semibold"
                                        style="color: #4f46e5; font-weight: 600; text-decoration: none; transition: color 0.2s ease; margin-right: 0.75rem;">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Delete this task?')"
                                            class="text-red-600 hover:text-red-900 font-semibold"
                                            style="color: #dc2626; font-weight: 600; background: none; border: none; cursor: pointer; transition: color 0.2s ease;">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4" style="margin-top: 1.5rem;">
                {{ $tasks->withQueryString()->links() }}
            </div>

        @else
            <div style="text-align: center; padding: 3rem; background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <svg style="width: 64px; height: 64px; margin: 0 auto 1rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p style="color: #6b7280; font-size: 1.125rem; margin-bottom: 0.5rem;">No tasks found</p>
                <p style="color: #9ca3af; font-size: 0.875rem;">Try adjusting your search filters or create a new task</p>
            </div>
        @endif
    </div>

    <style>
        /* Add hover effects for interactive elements */
        a:hover, button:hover {
            transform: translateY(-1px);
        }
        
        /* Style pagination links */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .pagination a, .pagination span {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .pagination a {
            background: white;
            border: 1px solid #e5e7eb;
            color: #4b5563;
        }
        
        .pagination a:hover {
            background: #4f46e5;
            color: white;
            border-color: #4f46e5;
        }
        
        .pagination span {
            background: #4f46e5;
            color: white;
            border: 1px solid #4f46e5;
        }
    </style>
</x-app-layout>
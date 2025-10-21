<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Inter', system-ui, sans-serif; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; font-size: 1.5rem;">
            {{ __('Edit Task') }}
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" style="max-width: 56rem; margin: 0 auto; padding: 1.5rem 1rem;">
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="mb-4 rounded-md bg-red-50 p-4" style="background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%); border: 1px solid #fecaca; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem; box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.1);">
                <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <svg style="width: 20px; height: 20px; flex-shrink: 0; color: #dc2626; margin-top: 0.125rem;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h3 style="font-weight: 600; color: #7f1d1d; margin-bottom: 0.5rem; font-size: 0.875rem;">Please fix the following errors:</h3>
                        <ul class="list-disc list-inside text-sm text-red-600" style="font-size: 0.875rem; color: #b91c1c; list-style-type: disc; list-style-position: inside; line-height: 1.5;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Edit form -->
        <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white p-6 rounded shadow-md" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative;">
            <!-- Edit indicator badge -->
            <div style="position: absolute; top: -10px; right: 20px; background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; box-shadow: 0 4px 6px -1px rgba(124, 58, 237, 0.3);">
                Editing Task
            </div>
            
            @csrf
            @method('PUT')

            <div class="mb-4" style="margin-bottom: 1.5rem;">
                <label for="title" class="block font-medium text-sm text-gray-700" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.5rem;">
                    Title <span style="color: #ef4444;">*</span>
                </label>
                <input id="title" type="text" name="title" value="{{ old('title', $task->title) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="margin-top: 0.25rem; display: block; width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                    placeholder="Enter task title" />
            </div>

            <div class="mb-4" style="margin-bottom: 1.5rem;">
                <label for="description" class="block font-medium text-sm text-gray-700" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.5rem;">
                    Description
                </label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="margin-top: 0.25rem; display: block; width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); resize: vertical; min-height: 120px; font-family: inherit;"
                    placeholder="Enter task description (optional)">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-6" style="margin-bottom: 2rem;">
                <label for="status" class="block font-medium text-sm text-gray-700" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.5rem;">
                    Status <span style="color: #ef4444;">*</span>
                </label>
                <select id="status" name="status" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    style="margin-top: 0.25rem; display: block; width: 100%; border: 1px solid #d1d5db; border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); cursor: pointer; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 4 5\"><path fill=\"%236b7280\" d=\"M2 0L0 2h4zm0 5L0 3h4z\"/></svg>'); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 0.75rem;">
                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in-progress" {{ old('status', $task->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="flex space-x-4" style="display: flex; gap: 1rem; align-items: center;">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none; border-radius: 10px; padding: 0.75rem 1.5rem; color: white; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3); transition: all 0.3s ease; cursor: pointer;">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Task
                </button>
                <a href="{{ route('tasks.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    style="border: 1px solid #d1d5db; border-radius: 10px; padding: 0.75rem 1.5rem; color: #374151; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; background: white;">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Cancel
                </a>
            </div>
            
            <!-- Form metadata -->
            <div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #f3f4f6; font-size: 0.75rem; color: #6b7280;">
                <div style="display: flex; gap: 1.5rem;">
                    <div>
                        <span style="font-weight: 500;">Created:</span> 
                        {{ $task->created_at->format('M j, Y g:i A') }}
                    </div>
                    <div>
                        <span style="font-weight: 500;">Last Updated:</span> 
                        {{ $task->updated_at->format('M j, Y g:i A') }}
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        /* Focus states for form elements */
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #6366f1 !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
        }
        
        /* Hover effects */
        button:hover, a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -2px rgba(0, 0, 0, 0.15) !important;
        }
        
        /* Smooth transitions */
        input, textarea, select, button, a {
            transition: all 0.2s ease-in-out;
        }
        
        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 6px;
        }
        
        textarea::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        textarea::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        textarea::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Status-specific styling for the form */
        @if($task->status === 'completed')
        form {
            border-left: 4px solid #10b981 !important;
        }
        @elseif($task->status === 'in-progress')
        form {
            border-left: 4px solid #f59e0b !important;
        }
        @else
        form {
            border-left: 4px solid #6b7280 !important;
        }
        @endif
    </style>
</x-app-layout>
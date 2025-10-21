<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Inter', system-ui, sans-serif; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; font-size: 1.5rem;">
            {{ __('View Task') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: calc(100vh - 80px); padding: 3rem 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width: 80rem; margin: 0 auto; padding: 0 1rem;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background: white; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden; position: relative;">
                <!-- Status indicator bar -->
                <div style="height: 6px; background: 
                    @if($task->status === 'completed') linear-gradient(90deg, #10b981, #34d399)
                    @elseif($task->status === 'in-progress') linear-gradient(90deg, #f59e0b, #fbbf24)
                    @else linear-gradient(90deg, #6b7280, #9ca3af)
                    @endif">
                </div>
                
                <div class="p-6 bg-white border-b border-gray-200" style="padding: 2.5rem; background: white; position: relative;">
                    <!-- Task ID badge -->
                    <div style="position: absolute; top: 1.5rem; right: 1.5rem; background: #f8fafc; color: #64748b; padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.75rem; font-weight: 600; border: 1px solid #e2e8f0;">
                        Task #{{ $task->id }}
                    </div>

                    <div class="mb-4" style="margin-bottom: 2rem;">
                        <div class="flex justify-between items-start" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                            <div style="flex: 1; margin-right: 1rem;">
                                <h3 class="text-2xl font-bold text-gray-900" style="font-size: 1.875rem; font-weight: 700; color: #1f2937; line-height: 1.2; margin-bottom: 0.5rem;">
                                    {{ $task->title }}
                                </h3>
                                <p class="text-sm text-gray-500" style="font-size: 0.875rem; color: #6b7280; display: flex; align-items: center; gap: 0.5rem;">
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Created on {{ $task->created_at->format('M d, Y') }}
                                    <span style="color: #d1d5db; margin: 0 0.5rem;">•</span>
                                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $task->created_at->format('g:i A') }}
                                </p>
                            </div>
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full capitalize {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : ($task->status === 'in-progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}"
                                  style="padding: 0.5rem 1rem; display: inline-flex; font-size: 0.875rem; font-weight: 600; border-radius: 20px; text-transform: capitalize; white-space: nowrap;
                                  @if($task->status === 'completed')
                                    background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; border: 1px solid #a7f3d0; box-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
                                  @elseif($task->status === 'in-progress')
                                    background: linear-gradient(135deg, #fef3c7, #fde68a); color: #92400e; border: 1px solid #fde68a; box-shadow: 0 2px 4px rgba(245, 158, 11, 0.1);
                                  @else
                                    background: linear-gradient(135deg, #f3f4f6, #e5e7eb); color: #374151; border: 1px solid #e5e7eb; box-shadow: 0 2px 4px rgba(107, 114, 128, 0.1);
                                  @endif">
                                <svg style="width: 14px; height: 14px; margin-right: 0.375rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($task->status === 'completed')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    @elseif($task->status === 'in-progress')
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    @else
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    @endif
                                </svg>
                                {{ str_replace('-', ' ', $task->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div style="margin-top: 2rem;">
                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                            <svg style="width: 20px; height: 20px; color: #4b5563;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h4 style="font-weight: 600; color: #374151; font-size: 1.125rem;">Description</h4>
                        </div>
                        
                        @if($task->description)
                            <div class="mt-6 text-gray-700 whitespace-pre-wrap" style="margin-top: 0.5rem; color: #4b5563; line-height: 1.7; white-space: pre-wrap; background: #f8fafc; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #6366f1;">
                                {{ $task->description }}
                            </div>
                        @else
                            <div style="margin-top: 0.5rem; color: #9ca3af; font-style: italic; background: #f8fafc; padding: 1.5rem; border-radius: 12px; text-align: center; border: 2px dashed #e5e7eb;">
                                No description provided for this task.
                            </div>
                        @endif
                    </div>

                    <!-- Additional Information -->
                    <div style="margin-top: 2rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div style="background: #f8fafc; padding: 1rem; border-radius: 8px;">
                            <div style="font-size: 0.75rem; color: #6b7280; font-weight: 500; margin-bottom: 0.25rem;">Last Updated</div>
                            <div style="font-size: 0.875rem; color: #374151; font-weight: 600;">
                                {{ $task->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <div style="background: #f8fafc; padding: 1rem; border-radius: 8px;">
                            <div style="font-size: 0.75rem; color: #6b7280; font-weight: 500; margin-bottom: 0.25rem;">Duration</div>
                            <div style="font-size: 0.875rem; color: #374151; font-weight: 600;">
                                {{ $task->created_at->diffInDays($task->updated_at) }} days
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 border-t pt-4 flex items-center justify-end space-x-2" style="margin-top: 2.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: flex-end; gap: 0.75rem;">
                        <a href="{{ route('tasks.edit', $task) }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150"
                           style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none; border-radius: 10px; padding: 0.75rem 1.5rem; color: white; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3); transition: all 0.3s ease;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Task
                        </a>
                        <a href="{{ route('dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150"
                           style="background: white; border: 1px solid #d1d5db; border-radius: 10px; padding: 0.75rem 1.5rem; color: #374151; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Hover effects */
        a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -2px rgba(0, 0, 0, 0.15) !important;
        }
        
        /* Smooth transitions */
        a {
            transition: all 0.2s ease-in-out;
        }
        
        /* Custom scrollbar for description */
        .whitespace-pre-wrap {
            max-height: 400px;
            overflow-y: auto;
        }
        
        .whitespace-pre-wrap::-webkit-scrollbar {
            width: 6px;
        }
        
        .whitespace-pre-wrap::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        .whitespace-pre-wrap::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        .whitespace-pre-wrap::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</x-app-layout>
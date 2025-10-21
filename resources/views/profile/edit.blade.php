<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Inter', system-ui, sans-serif; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; font-size: 1.5rem;">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: calc(100vh - 80px); padding: 3rem 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width: 80rem; margin: 0 auto; padding: 0 1rem; display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- Profile Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                <!-- Decorative accent -->
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #6366f1, #8b5cf6);"></div>
                
                <div class="max-w-xl" style="max-width: 36rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div style="background: linear-gradient(135deg, #6366f1, #8b5cf6); padding: 0.75rem; border-radius: 12px;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin: 0;">Profile Information</h3>
                            <p style="color: #6b7280; font-size: 0.875rem; margin: 0.25rem 0 0 0;">Update your account's profile information and email address.</p>
                        </div>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden;">
                <!-- Decorative accent -->
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #10b981, #34d399);"></div>
                
                <div class="max-w-xl" style="max-width: 36rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div style="background: linear-gradient(135deg, #10b981, #34d399); padding: 0.75rem; border-radius: 12px;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin: 0;">Update Password</h3>
                            <p style="color: #6b7280; font-size: 0.875rem; margin: 0.25rem 0 0 0;">Ensure your account is using a long, random password to stay secure.</p>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; border: 1px solid #fecaca;">
                <!-- Decorative accent -->
                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #ef4444, #f87171);"></div>
                
                <div class="max-w-xl" style="max-width: 36rem;">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div style="background: linear-gradient(135deg, #ef4444, #f87171); padding: 0.75rem; border-radius: 12px;">
                            <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #1f2937; margin: 0;">Delete Account</h3>
                            <p style="color: #6b7280; font-size: 0.875rem; margin: 0.25rem 0 0 0;">Permanently delete your account and all of its resources.</p>
                        </div>
                    </div>
                    
                    <!-- Warning Alert -->
                    <div style="background: linear-gradient(135deg, #fef2f2, #fee2e2); border: 1px solid #fecaca; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <svg style="width: 20px; height: 20px; color: #dc2626; flex-shrink: 0; margin-top: 0.125rem;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h4 style="font-weight: 600; color: #7f1d1d; margin-bottom: 0.5rem; font-size: 0.875rem;">Warning: This action cannot be undone</h4>
                                <p style="color: #b91c1c; font-size: 0.875rem; line-height: 1.5; margin: 0;">
                                    Once your account is deleted, all of your resources and data will be permanently erased. 
                                    Please be certain before proceeding.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Enhanced form styling for included partials */
        .max-w-xl form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        /* Style form sections */
        .max-w-xl form > div {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        
        /* Style form labels */
        .max-w-xl label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }
        
        /* Style form inputs */
        .max-w-xl input[type="text"],
        .max-w-xl input[type="email"],
        .max-w-xl input[type="password"] {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: white;
        }
        
        .max-w-xl input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        
        /* Style buttons */
        .max-w-xl button[type="submit"] {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .max-w-xl button[type="submit"]:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        
        /* Delete button specific styling */
        .max-w-xl button[type="submit"].bg-red-600 {
            background: linear-gradient(135deg, #ef4444, #dc2626) !important;
        }
        
        .max-w-xl button[type="submit"].bg-red-600:hover {
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }
        
        /* Hover effects for cards */
        .p-4:hover {
            transform: translateY(-2px);
            transition: transform 0.2s ease;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .py-12 {
                padding: 1.5rem 0;
            }
            
            .p-4 {
                padding: 1.5rem;
            }
            
            .max-w-7xl {
                padding: 0 0.5rem;
            }
        }
    </style>
</x-app-layout>
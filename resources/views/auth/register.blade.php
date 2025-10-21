<x-guest-layout>
    <div style="min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
        <div style="background: white; padding: 3rem 2.5rem; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); width: 100%; max-width: 28rem; position: relative;">
            
            <!-- Decorative elements -->
            <div style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); background: linear-gradient(135deg, #10b981, #34d399); color: white; padding: 0.75rem 2rem; border-radius: 50px; font-weight: 600; font-size: 1.125rem; box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);">
                Create Account
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Header -->
                <div style="text-align: center; margin-bottom: 2.5rem; margin-top: 1rem;">
                    <h2 style="font-size: 1.875rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">Get Started</h2>
                    <p style="color: #6b7280; font-size: 0.875rem;">Create your account to start managing tasks</p>
                </div>

                <!-- Name -->
                <div style="margin-bottom: 1.5rem;">
                    <x-input-label for="name" :value="__('Name')" style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.875rem;" />
                    <div style="position: relative;">
                        <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <x-text-input 
                            id="name" 
                            style="display: block; width: 100%; padding: 0.75rem 1rem 0.75rem 3rem; border: 1px solid #d1d5db; border-radius: 12px; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name"
                            placeholder="Enter your full name" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;" />
                </div>

                <!-- Email Address -->
                <div style="margin-bottom: 1.5rem;">
                    <x-input-label for="email" :value="__('Email')" style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.875rem;" />
                    <div style="position: relative;">
                        <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                        <x-text-input 
                            id="email" 
                            style="display: block; width: 100%; padding: 0.75rem 1rem 0.75rem 3rem; border: 1px solid #d1d5db; border-radius: 12px; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="username"
                            placeholder="Enter your email address" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;" />
                </div>

                <!-- Password -->
                <div style="margin-bottom: 1.5rem;">
                    <x-input-label for="password" :value="__('Password')" style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.875rem;" />
                    <div style="position: relative;">
                        <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <x-text-input 
                            id="password" 
                            style="display: block; width: 100%; padding: 0.75rem 1rem 0.75rem 3rem; border: 1px solid #d1d5db; border-radius: 12px; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="Create a strong password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;" />
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom: 2rem;">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="display: block; font-weight: 500; color: #374151; margin-bottom: 0.5rem; font-size: 0.875rem;" />
                    <div style="position: relative;">
                        <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <x-text-input 
                            id="password_confirmation" 
                            style="display: block; width: 100%; padding: 0.75rem 1rem 0.75rem 3rem; border: 1px solid #d1d5db; border-radius: 12px; font-size: 0.875rem; transition: all 0.2s ease; background: #f9fafb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="Confirm your password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;" />
                </div>

                <!-- Register Button -->
                <button 
                    type="submit"
                    style="width: 100%; background: linear-gradient(135deg, #10b981 0%, #34d399 100%); color: white; border: none; border-radius: 12px; padding: 1rem 2rem; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4); display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    {{ __('Create Account') }}
                </button>

                <!-- Login Link -->
                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e5e7eb;">
                    <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
                        Already have an account?
                    </p>
                    <a 
                        href="{{ route('login') }}" 
                        style="color: #6366f1; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: color 0.2s ease; display: inline-flex; align-items: center; gap: 0.25rem;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Sign in to your account
                    </a>
                </div>

                <!-- Terms Notice -->
                <div style="margin-top: 1.5rem; text-align: center;">
                    <p style="color: #9ca3af; font-size: 0.75rem; line-height: 1.4;">
                        By creating an account, you agree to our 
                        <a href="#" style="color: #6366f1; text-decoration: none;">Terms of Service</a> 
                        and 
                        <a href="#" style="color: #6366f1; text-decoration: none;">Privacy Policy</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Focus states */
        input:focus {
            outline: none;
            border-color: #6366f1 !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
        }

        /* Hover effects */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5) !important;
        }

        a:hover {
            color: #4f46e5 !important;
        }

        /* Smooth transitions */
        input, button, a {
            transition: all 0.2s ease-in-out;
        }

        /* Password strength indicator (optional enhancement) */
        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.75rem;
        }

        .strength-weak { color: #dc2626; }
        .strength-medium { color: #f59e0b; }
        .strength-strong { color: #10b981; }
    </style>

    <script>
        // Optional: Add password strength indicator
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const strengthIndicator = document.createElement('div');
            strengthIndicator.className = 'password-strength';
            passwordInput.parentNode.appendChild(strengthIndicator);

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 'Weak';
                let strengthClass = 'strength-weak';

                if (password.length >= 8) {
                    strength = 'Medium';
                    strengthClass = 'strength-medium';
                }
                if (password.length >= 12 && /[A-Z]/.test(password) && /[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) {
                    strength = 'Strong';
                    strengthClass = 'strength-strong';
                }

                strengthIndicator.textContent = `Password strength: ${strength}`;
                strengthIndicator.className = `password-strength ${strengthClass}`;
            });
        });
    </script>
</x-guest-layout>
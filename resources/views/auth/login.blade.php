<<x-guest-layout>
    <div style="min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; padding: 2rem 1rem;">
        <div style="background: white; padding: 3rem 2.5rem; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); width: 100%; max-width: 28rem; position: relative;">
            
            <!-- Decorative elements -->
            <div style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 0.75rem 2rem; border-radius: 50px; font-weight: 600; font-size: 1.125rem; box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.4);">
                Welcome Back
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Header -->
                <div style="text-align: center; margin-bottom: 2.5rem; margin-top: 1rem;">
                    <h2 style="font-size: 1.875rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">Sign In</h2>
                    <p style="color: #6b7280; font-size: 0.875rem;">Enter your credentials to access your account</p>
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
                            autofocus 
                            autocomplete="username"
                            placeholder="Enter your email" />
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
                            autocomplete="current-password"
                            placeholder="Enter your password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" style="margin-top: 0.5rem; font-size: 0.875rem; color: #dc2626;" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <label for="remember_me" style="display: inline-flex; align-items: center; cursor: pointer;">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            style="width: 1rem; height: 1rem; border: 1px solid #d1d5db; border-radius: 4px; background: white; cursor: pointer; transition: all 0.2s ease;" 
                            name="remember" />
                        <span style="margin-left: 0.5rem; font-size: 0.875rem; color: #374151; font-weight: 500;">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a 
                            href="{{ route('password.request') }}" 
                            style="font-size: 0.875rem; color: #6366f1; text-decoration: none; font-weight: 500; transition: color 0.2s ease;">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button 
                    type="submit"
                    style="width: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 12px; padding: 1rem 2rem; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Log in') }}
                </button>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e5e7eb;">
                        <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
                            Don't have an account?
                        </p>
                        <a 
                            href="{{ route('register') }}" 
                            style="color: #6366f1; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: color 0.2s ease; display: inline-flex; align-items: center; gap: 0.25rem;">
                            Create an account
                            <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endif
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

        /* Checkbox focus */
        input[type="checkbox"]:focus {
            outline: 2px solid #6366f1;
            outline-offset: 2px;
        }

        /* Hover effects */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5) !important;
        }

        a:hover {
            color: #4f46e5 !important;
        }

        /* Smooth transitions */
        input, button, a {
            transition: all 0.2s ease-in-out;
        }

        /* Checkbox checked state */
        input[type="checkbox"]:checked {
            background-color: #6366f1;
            border-color: #6366f1;
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
        }
    </style>
</x-guest-layout>
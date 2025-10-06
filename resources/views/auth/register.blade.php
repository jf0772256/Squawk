
<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center mb-6">Create Account</h1>

                    <form method="POST" action="/register">
                        @csrf

                        <!-- Name -->
                        <label class="floating-label mb-6">
                            <input type="text"
                                   name="name"
                                   placeholder="John Doe"
                                   value="{{ old('name') }}"
                                   class="input input-bordered @error('name') input-error @enderror"
                                   aria-description="Your name"
                                   required>
                            <span>Name</span>
                        </label>
                        @error('name')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                        @enderror

                        <!-- Email -->
                        <label class="floating-label mb-6">
                            <input type="email"
                                   name="email"
                                   placeholder="[mail@example.com](<mailto:mail@example.com>)"
                                   value="{{ old('email') }}"
                                   class="input input-bordered @error('email') input-error @enderror"
                                   aria-description="Your email address"
                                   required>
                            <span>Email</span>
                        </label>
                        @error('email')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                        @enderror

                        <!-- Password -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input input-bordered @error('password') input-error @enderror"
                                   aria-description="Create your password used to log in"
                                   required>
                            <span>Password</span>
                        </label>
                        @error('password')
                        <div class="label -mt-4 mb-2">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                        @enderror

                        <!-- Password Confirmation -->
                        <label class="floating-label mb-6">
                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="••••••••"
                                   class="input input-bordered"
                                   aria-description="Reenter your new password to confirm"
                                   required>
                            <span>Confirm Password</span>
                        </label>

                        <!-- Submit Button -->
                        <div class="form-control mt-8">
                            <button type="submit" role="button" class="btn btn-primary btn-sm w-full" aria-description="Submit to create your account">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="divider">OR</div>
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="/login" class="link link-primary" aria-label="Directs you to the log in page to log in with existing credentials">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join as Artisan - {{ config('app.name', 'Artisan Platform') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> 
        body { font-family: 'Lato', sans-serif; } 
        h1, h2, h3, .font-heading { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-100 min-h-screen flex items-center justify-center relative p-4">

    <div class="absolute inset-0 bg-stone-900/5 z-0" style="background-image: radial-gradient(#d6d3d1 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="w-full max-w-lg bg-white border border-stone-200 shadow-sm relative z-10 p-8 sm:p-10 my-8">
        
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block mb-4 hover:opacity-90 transition-opacity">
                <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-16 w-auto mx-auto rounded-lg shadow-sm">
            </a>
            <h2 class="font-heading text-3xl font-bold text-stone-900">Join our Community</h2>
            <div class="w-12 h-1 bg-stone-900 mx-auto mt-4 mb-2"></div>
            <p class="text-stone-500 text-sm">Create an account to start your journey.</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first-name" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">First name</label>
                    <input id="first-name" name="first-name" type="text" value="{{ old('first-name') }}" required class="w-full px-4 py-3 border {{ $errors->has('first-name') ? 'border-red-500' : 'border-stone-300' }} focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="John">
                    @error('first-name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last-name" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Last name</label>
                    <input id="last-name" name="last-name" type="text" value="{{ old('last-name') }}" required class="w-full px-4 py-3 border {{ $errors->has('last-name') ? 'border-red-500' : 'border-stone-300' }} focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="Doe">
                    @error('last-name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Email address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required class="w-full px-4 py-3 border {{ $errors->has('email') ? 'border-red-500' : 'border-stone-300' }} focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="you@example.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Password</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required class="w-full px-4 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-stone-300' }} focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="••••••••">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="w-full px-4 py-3 border border-stone-300 focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="••••••••">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <label class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-3">I want to...</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="client" class="peer sr-only" {{ old('role', request('role')) !== 'artisan' ? 'checked' : '' }}>
                        <div class="rounded-sm border {{ $errors->has('role') ? 'border-red-500' : 'border-stone-300' }} bg-white p-4 text-center hover:bg-stone-50 peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-900 shadow-sm transition-all focus-within:ring-2 focus-within:ring-amber-600 focus-within:ring-offset-2">
                            <span class="block text-sm font-bold">Hire Artisans</span>
                            <span class="block text-xs text-stone-500 mt-1 font-normal uppercase tracking-wider">Find services</span>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="artisan" class="peer sr-only" {{ old('role', request('role')) === 'artisan' ? 'checked' : '' }}>
                        <div class="rounded-sm border {{ $errors->has('role') ? 'border-red-500' : 'border-stone-300' }} bg-white p-4 text-center hover:bg-stone-50 peer-checked:border-amber-600 peer-checked:bg-amber-50 peer-checked:text-amber-900 shadow-sm transition-all focus-within:ring-2 focus-within:ring-amber-600 focus-within:ring-offset-2">
                            <span class="block text-sm font-bold">Be an Artisan</span>
                            <span class="block text-xs text-stone-500 mt-1 font-normal uppercase tracking-wider">Offer services</span>
                        </div>
                    </label>
                </div>
                @error('role')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-start mt-4">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-amber-700 focus:ring-amber-600 border-stone-300 rounded-sm">
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="font-medium text-stone-600">
                        I agree to the <a href="#" class="text-amber-700 hover:text-amber-800 underline transition-colors">Terms of Service</a> and <a href="#" class="text-amber-700 hover:text-amber-800 underline transition-colors">Privacy Policy</a>
                    </label>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 px-4 flex justify-center text-sm font-bold tracking-widest uppercase text-white bg-amber-700 hover:bg-amber-800 transition-colors">
                    Join the Platform
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-stone-500 border-t border-stone-100 pt-6">
            Already a member?
            <a href="{{ route('login') }}" class="font-bold text-stone-900 hover:text-amber-700 transition-colors ml-1 border-b border-transparent hover:border-amber-700 pb-0.5 uppercase tracking-wider text-xs">
                Sign in
            </a>
        </p>
    </div>
</body>
</html>

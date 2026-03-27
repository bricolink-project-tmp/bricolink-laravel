<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - {{ config('app.name', 'Artisan Platform') }}</title>
    
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

    <div class="w-full max-w-md bg-white border border-stone-200 shadow-sm relative z-10 p-8 sm:p-10">
        
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-12 h-12 rounded bg-amber-700 text-amber-50 font-heading font-bold text-2xl mb-4 hover:bg-stone-900 transition-colors">
                {{ substr(config('app.name', 'A'), 0, 1) }}
            </a>
            <h2 class="font-heading text-3xl font-bold text-stone-900">Welcome back</h2>
            <div class="w-12 h-1 bg-amber-700 mx-auto mt-4 mb-2"></div>
            <p class="text-stone-500 text-sm">Please enter your details to sign in.</p>
        </div>

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required class="w-full px-4 py-3 border border-stone-300 focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="you@example.com">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold tracking-widest text-stone-500 uppercase mb-2">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="w-full px-4 py-3 border border-stone-300 focus:border-amber-600 focus:ring-1 focus:ring-amber-600 outline-none transition-all placeholder:text-stone-400 bg-stone-50" placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-amber-700 focus:ring-amber-600 border-stone-300 rounded-sm">
                    <label for="remember-me" class="ml-2 block text-sm text-stone-600">
                        Remember me
                    </label>
                </div>

                <div class="text-sm border-b border-transparent hover:border-amber-700 transition-colors pb-0.5">
                    <a href="#" class="font-bold text-stone-500 hover:text-amber-700 transition-colors uppercase tracking-wider text-xs">
                        Forgot password?
                    </a>
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-4 px-4 flex justify-center text-sm font-bold tracking-widest uppercase text-white bg-stone-900 hover:bg-stone-800 transition-colors">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-stone-500 border-t border-stone-100 pt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-bold text-amber-700 hover:text-stone-900 transition-colors ml-1 border-b border-transparent hover:border-stone-900 pb-0.5">
                SIGN UP NOW
            </a>
        </p>
    </div>
</body>
</html>

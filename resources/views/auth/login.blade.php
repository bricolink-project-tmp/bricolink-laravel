<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - {{ config('app.name', 'Artisan Project') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center relative overflow-hidden p-4">

    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 relative z-10 p-8 sm:p-10">
        
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-bold text-xl shadow-lg mb-4 hover:scale-105 transition-transform">
                {{ substr(config('app.name', 'A'), 0, 1) }}
            </a>
            <h2 class="text-2xl font-bold text-slate-900">Welcome back</h2>
            <p class="text-slate-500 text-sm mt-2">Please enter your details to sign in.</p>
        </div>

        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="you@example.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-slate-600">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Forgot password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full py-3 px-4 flex justify-center text-sm font-semibold rounded-xl text-white bg-slate-900 hover:bg-slate-800 transition-all shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-0.5">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Sign up now
            </a>
        </p>
    </div>
</body>
</html>

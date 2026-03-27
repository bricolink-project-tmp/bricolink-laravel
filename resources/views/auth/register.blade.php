<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - {{ config('app.name', 'Artisan Project') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center relative overflow-hidden p-4">

    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 -mt-20 -ml-20 w-96 h-96 bg-rose-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 right-0 -mb-20 -mr-20 w-96 h-96 bg-orange-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-100 relative z-10 p-8 sm:p-10 my-8">
        
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-bold text-xl shadow-lg mb-4 hover:scale-105 transition-transform">
                {{ substr(config('app.name', 'A'), 0, 1) }}
            </a>
            <h2 class="text-2xl font-bold text-slate-900">Join the Squad</h2>
            <p class="text-slate-500 text-sm mt-2">Create an account to start your journey.</p>
        </div>

        <form action="#" method="POST" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first-name" class="block text-sm font-medium text-slate-700 mb-1">First name</label>
                    <input id="first-name" name="first-name" type="text" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="John">
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-medium text-slate-700 mb-1">Last name</label>
                    <input id="last-name" name="last-name" type="text" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="Doe">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email address</label>
                <input id="email" name="email" type="email" autocomplete="email" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="you@example.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="••••••••">
            </div>

            <div>
                <label for="password-confirm" class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                <input id="password-confirm" name="password-confirm" type="password" autocomplete="new-password" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all placeholder:text-slate-400" placeholder="••••••••">
            </div>

            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-slate-600">
                    I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Terms</a> and <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Privacy Policy</a>.
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-3 px-4 flex justify-center text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg shadow-indigo-200 hover:shadow-xl hover:-translate-y-0.5">
                    Create Account
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-slate-500">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Sign in instead
            </a>
        </p>
    </div>
</body>
</html>

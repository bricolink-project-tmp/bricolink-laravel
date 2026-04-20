<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Settings - Artisan Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <style> 
        body { font-family: 'Lato', sans-serif; } 
        h1, h2, h3, .font-heading { font-family: 'Playfair Display', serif; }
        
        .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(231, 229, 228, 0.6); }
        .dark .glass-card { background: rgba(28, 25, 23, 0.7); border: 1px solid rgba(120, 113, 108, 0.2); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 selection:bg-amber-700 selection:text-white pb-32 md:pb-12 transition-colors duration-300">

    <nav class="fixed top-0 w-full z-50 glass-card border-b border-stone-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading text-2xl font-bold tracking-tight text-stone-900">Artisan <span class="text-amber-700 italic font-normal">Hub</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-stone-500 hover:text-amber-600 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <span class="hidden sm:inline-block text-sm text-stone-500">Welcome, <span class="text-stone-900">{{ explode(' ', Auth::user()->name)[0] }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-500 hover:text-amber-700 transition-colors">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-32 max-w-4xl mx-auto px-6 lg:px-8">


        <header class="mb-12 mt-8 md:mt-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div>
                <a href="{{ url()->previous() }}" class="text-stone-500 hover:text-amber-600 text-sm flex items-center gap-2 mb-6 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Previous Page
                </a>
                <h1 class="font-heading text-4xl md:text-5xl text-stone-900 tracking-tight">Account Settings</h1>
            </div>
            @if(Auth::user()->role === 'artisan')
            <div>
                <a href="{{ route('artisan.settings') }}" class="inline-flex items-center gap-2 bg-stone-200 text-stone-800 hover:bg-stone-300 px-4 py-2 rounded text-sm font-bold uppercase tracking-widest transition-colors">
                    <span class="material-symbols-outlined text-[18px]">build</span> Artisan Settings
                </a>
            </div>
            @endif
        </header>

        @if (session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            
            <div class="md:col-span-2 space-y-8">
                <!-- Personal Info -->
                <section class="glass-card rounded-xl p-8 md:p-10 shadow-sm relative z-10">
                    <h2 class="font-heading text-2xl text-stone-900 mb-6 border-b border-stone-200 pb-4">Personal Information</h2>
                    
                    <form action="{{ route('settings.profile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="flex items-center gap-6 mb-6">
                            <label for="profile_pic_upload" class="cursor-pointer relative group block">
                                @if($user->profile_pic)
                                    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border border-stone-200 group-hover:opacity-50 transition-opacity">
                                @else
                                    <div class="w-20 h-20 rounded-full bg-stone-100 border border-stone-200 text-2xl flex items-center justify-center font-bold text-stone-500 group-hover:opacity-50 transition-opacity">{{ substr($user->name, 0, 2) }}</div>
                                @endif
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="material-symbols-outlined text-stone-900 drop-shadow-md">upload</span>
                                </div>
                            </label>
                            
                            <div>
                                <label class="block text-xs uppercase font-bold text-stone-600 mb-2">Change Picture (Max 1MB)</label>
                                <input type="file" id="profile_pic_upload" name="profile_pic" accept="image/jpeg,image/png,image/jpg" class="hidden">
                                <label for="profile_pic_upload" class="cursor-pointer inline-block bg-stone-200 text-stone-700 hover:bg-stone-300 py-2 px-4 rounded text-xs font-bold uppercase tracking-widest transition-colors">
                                    Browse...
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs uppercase font-bold text-stone-600 mb-2">Full Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-stone-50 border border-stone-200 rounded px-4 py-3 text-stone-900 focus:ring-1 focus:ring-amber-500 transition-colors" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-stone-200 mt-6">
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-stone-400 mb-1">Email Address (Read-Only)</label>
                                <input type="email" value="{{ $user->email }}" class="w-full bg-stone-100 border border-stone-200 rounded px-4 py-2 text-stone-500 cursor-not-allowed" disabled>
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-stone-400 mb-1">Unique User ID (Read-Only)</label>
                                <div class="w-full bg-stone-100 border border-stone-200 rounded px-4 py-2 text-stone-500 font-mono text-sm">{{ $user->unique_id }}</div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded transition-colors shadow-sm">Save Profile Details</button>
                        </div>
                    </form>
                </section>

                <!-- Password Info -->
                <section class="glass-card rounded-xl p-8 md:p-10 shadow-sm relative z-10">
                    <h2 class="font-heading text-2xl text-stone-900 mb-6 border-b border-stone-200 pb-4">Change Password</h2>
                    
                    <form action="{{ route('settings.password') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label class="block text-xs uppercase font-bold text-stone-600 mb-2">Current Password</label>
                            <input type="password" name="current_password" class="w-full bg-stone-50 border border-stone-200 rounded px-4 py-3 text-stone-900 focus:ring-1 focus:ring-amber-500 transition-colors" required>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs uppercase font-bold text-stone-600 mb-2">New Password</label>
                                <input type="password" name="new_password" class="w-full bg-stone-50 border border-stone-200 rounded px-4 py-3 text-stone-900 focus:ring-1 focus:ring-amber-500 transition-colors" required>
                            </div>
                            <div>
                                <label class="block text-xs uppercase font-bold text-stone-600 mb-2">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="w-full bg-stone-50 border border-stone-200 rounded px-4 py-3 text-stone-900 focus:ring-1 focus:ring-amber-500 transition-colors" required>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded transition-colors shadow-sm">Update Password</button>
                        </div>
                    </form>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <section class="bg-stone-100 rounded-xl p-6 md:p-8 border border-stone-200">
                    <h3 class="font-heading text-xl text-stone-900 mb-4 border-b border-stone-200 pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-amber-600">security</span> Account Status
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">Account Role</div>
                            <div class="font-bold text-stone-900 capitalize">{{ $user->role }} Account</div>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-stone-500 mb-1">Member Since</div>
                            <div class="font-bold text-stone-900">{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}</div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </main>

    <script>
        // Setup Icon Display
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Settings - Artisan</title>
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
        
        /* Light Mode Classes */
        .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(231, 229, 228, 0.6); }
        .glow-amber { box-shadow: 0 0 15px rgba(180, 83, 9, 0.15); }
        
        /* Dark Mode Classes */
        .dark .glass-card { background: rgba(28, 25, 23, 0.7); border: 1px solid rgba(120, 113, 108, 0.2); }
        .dark .glow-amber { box-shadow: 0 0 20px rgba(217, 119, 6, 0.15); }
        .dark .glow-amber-text { text-shadow: 0 0 15px rgba(217, 119, 6, 0.4); }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 selection:bg-amber-700 selection:text-white pb-20 transition-colors duration-300">

    <!-- Premium Navbar -->
    <nav class="fixed w-full z-50 glass-card border-b border-stone-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-stone-500 hover:text-amber-700 transition-colors group">
                    <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span class="font-bold tracking-widest uppercase text-xs">Back to Dashboard</span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Global Settings Link -->
                    <a href="{{ route('settings.index') }}" class="text-stone-500 hover:text-amber-600 transition-colors" title="Account Settings">
                        <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
                    </a>
                    <!-- Artisan Settings Link -->
                    <a href="{{ route('artisan.settings') }}" class="text-stone-500 hover:text-amber-600 transition-colors" title="Professional Profile">
                        <span class="material-symbols-outlined text-[20px]">build</span>
                    </a>
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-stone-500 hover:text-amber-600 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    <span class="hidden sm:inline-block text-sm text-stone-500"><span class="text-stone-900">{{ explode(' ', $user->name)[0] }}</span>'s Settings</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Session Alerts -->
        @if (session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <div class="mb-12">
            <h1 class="font-heading text-4xl font-bold text-stone-900 mb-2">Profile & Preferences</h1>
            <p class="text-stone-500">Manage how clients discover and engage with you.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Left Column: Tips & Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="glass-card rounded-lg p-6 bg-amber-50 border border-amber-200">
                    <h3 class="text-amber-800 font-bold uppercase tracking-widest text-xs mb-3">Standing Out</h3>
                    <p class="text-stone-600 text-sm leading-relaxed mb-4">Clients are 3x more likely to contact artisans who have detailed bios. Mention:</p>
                    <ul class="text-xs text-stone-600 space-y-2 list-disc pl-4">
                        <li>Your years of experience.</li>
                        <li>Any specific specialization you have.</li>
                        <li>Your commitment to quality & materials.</li>
                    </ul>
                </div>
                <a href="{{ route('settings.index') }}" class="block glass-card rounded-lg p-6 border-l-4 border-l-amber-500 hover:border-l-amber-600 transition-all shadow-sm hover:shadow-md hover:-translate-y-1 cursor-pointer group">
                    <h3 class="text-stone-800 font-bold uppercase tracking-widest text-xs mb-2 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px] text-amber-600">manage_accounts</span> Account Settings
                    </h3>
                    <p class="text-stone-500 text-xs mb-4">Update your profile picture, name, and password.</p>
                    <div class="text-[10px] font-bold text-amber-600 flex items-center gap-1 group-hover:gap-2 transition-all uppercase tracking-widest">
                        Manage Account <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                    </div>
                </a>
            </div>

            <!-- Right Column: Form -->
            <div class="lg:col-span-2">
                <div class="glass-card rounded-xl p-8 shadow-sm">
                    <form action="{{ route('artisan.profile.update') }}" method="POST">
                        @csrf
                        
                        <div class="mb-8 relative">
                            <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-3">Craft Category</label>
                            <p class="text-xs text-stone-500 mb-3">Select the primary category clients will use to filter their searches for you.</p>
                            <div class="relative">
                                <select name="craft_type" class="w-full bg-stone-50 border border-stone-200 rounded p-4 text-sm text-stone-800 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors appearance-none cursor-pointer">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->name }}" {{ $user->artisan->craft_type == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-stone-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-3">Professional Bio</label>
                            <p class="text-xs text-stone-500 mb-3">This text will be prominently displayed on your artisan card in the local feed.</p>
                            <textarea name="bio" rows="8" class="w-full bg-stone-50 border border-stone-200 rounded p-4 text-sm text-stone-800 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors leading-relaxed" placeholder="Passionate artisan dedicated to high-quality craftsmanship...">{{ $user->artisan->bio }}</textarea>
                        </div>

                        <div class="flex justify-end pt-4 border-t border-stone-200">
                            <button type="submit" class="bg-amber-700 hover:bg-amber-800 text-stone-50 text-xs font-bold uppercase tracking-widest py-4 px-8 rounded transition-all shadow-md hover:shadow-lg">
                                Save Settings
                            </button>
                        </div>
                    </form>
                </div>
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

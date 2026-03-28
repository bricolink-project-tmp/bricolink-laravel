<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discovery Feed - Artisan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Theme Script (Early execution to prevent flash) -->
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
        .dark .glow-amber-text { text-shadow: 0 0 10px rgba(217, 119, 6, 0.3); }
        
        /* Placeholders */
        .portfolio-placeholder-1 { background: linear-gradient(135deg, #e7e5e4 0%, #d6d3d1 100%); }
        .portfolio-placeholder-2 { background: linear-gradient(135deg, #d6d3d1 0%, #a8a29e 100%); }
        .portfolio-placeholder-3 { background: linear-gradient(135deg, #b45309 0%, #9a3412 100%); opacity: 0.8; }
        
        .dark .portfolio-placeholder-1 { background: linear-gradient(135deg, #44403c 0%, #292524 100%); }
        .dark .portfolio-placeholder-2 { background: linear-gradient(135deg, #78716c 0%, #44403c 100%); }
        .dark .portfolio-placeholder-3 { background: linear-gradient(135deg, #d97706 0%, #9a3412 100%); }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 dark:bg-[#0c0a09] dark:text-[#d6d3d1] selection:bg-amber-700 selection:text-white transition-colors duration-300">

    <!-- Premium Navbar -->
    <nav class="fixed w-full z-50 glass-card border-b border-stone-200 dark:border-b-0 dark:border-stone-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading text-2xl font-bold tracking-tight text-stone-900 dark:text-stone-100">Artisan <span class="text-amber-700 dark:text-amber-600 italic font-normal">Discover</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-stone-500 dark:text-stone-400 hover:text-amber-600 dark:hover:text-amber-400 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <span class="hidden sm:inline-block text-sm text-stone-500 dark:text-stone-400">Welcome, <span class="text-stone-900 dark:text-stone-200">{{ explode(' ', $user->name)[0] }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-500 dark:text-stone-400 hover:text-amber-700 dark:hover:text-amber-500 transition-colors">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Hero Section -->
        <div class="mb-16 text-center max-w-2xl mx-auto">
            <h1 class="font-heading text-5xl font-bold text-stone-900 dark:text-stone-100 mb-4 dark:glow-amber-text">Find Your Master Craftsman</h1>
            <p class="text-stone-600 dark:text-stone-400 text-lg font-light">Explore portfolios, check availability, and connect with trusted artisans in your community.</p>
        </div>

        <!-- Dynamic Category Pills -->
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <button class="px-6 py-2 rounded-full border border-amber-700/50 dark:border-amber-600/50 bg-amber-100 dark:bg-amber-900/20 text-amber-800 dark:text-amber-500 text-xs font-bold tracking-widest uppercase hover:bg-amber-200 dark:hover:bg-amber-900/40 transition-colors shadow-sm dark:shadow-[0_0_10px_rgba(217,119,6,0.2)]">All</button>
            @foreach($categories as $category)
            <button class="px-6 py-2 rounded-full border border-stone-300 dark:border-stone-800 bg-white dark:bg-stone-900/50 text-stone-600 dark:text-stone-400 text-xs font-bold tracking-widest uppercase hover:border-amber-700/50 dark:hover:border-amber-600/30 hover:text-stone-900 dark:hover:text-stone-200 transition-colors shadow-sm dark:shadow-none">{{ $category->name }}</button>
            @endforeach
        </div>

        <!-- Available Now Ribbon -->
        <div class="mb-8 flex items-center justify-between border-b border-stone-200 dark:border-stone-800 pb-4">
            <h2 class="text-xs font-bold tracking-widest text-stone-500 dark:text-stone-400 uppercase flex items-center">
                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-3 animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.4)] dark:shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span> Available Now
            </h2>
            <span class="text-xs text-stone-500 italic">Showing active artisans ready for hire</span>
        </div>

        <!-- Rich Artisan Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">
            @foreach($featuredArtisans as $artisanUser)
            <div class="glass-card rounded-lg p-6 flex flex-col sm:flex-row gap-6 hover:border-amber-700/40 dark:hover:border-amber-600/40 transition-colors shadow-md dark:shadow-lg group">
                
                <!-- Left: Profile & Mini Portfolio -->
                <div class="w-full sm:w-1/3 flex flex-col gap-3">
                    <div class="aspect-square rounded portfolio-placeholder-1 w-full relative overflow-hidden group-hover:glow-amber transition-all">
                        <div class="absolute inset-0 flex items-center justify-center opacity-30 dark:opacity-20 text-stone-900 dark:text-stone-100">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="aspect-square rounded portfolio-placeholder-2 w-full border border-stone-300 dark:border-stone-800"></div>
                        <div class="aspect-square rounded portfolio-placeholder-3 w-full border border-stone-300 dark:border-stone-800"></div>
                    </div>
                </div>

                <!-- Right: Details & Actions -->
                <div class="w-full sm:w-2/3 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-2 mt-2 sm:mt-0">
                            <div>
                                <h3 class="font-heading text-2xl font-bold text-stone-900 dark:text-stone-100">{{ $artisanUser->name }}</h3>
                                <p class="text-amber-700 dark:text-amber-500 text-xs font-bold tracking-widest uppercase mt-1 dark:glow-amber-text">{{ $artisanUser->artisan->craft_type }}</p>
                            </div>
                            <!-- Availability Badge -->
                            <div class="bg-emerald-100 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800/50 px-3 py-1 text-[10px] font-bold tracking-widest uppercase rounded whitespace-nowrap">Available</div>
                        </div>
                        <p class="text-stone-600 dark:text-stone-400 text-sm leading-relaxed mt-4 italic line-clamp-3">
                            "{{ $artisanUser->artisan->bio ?? 'Passionate artisan dedicated to high-quality craftsmanship.' }}"
                        </p>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button class="flex-1 bg-amber-700 hover:bg-amber-800 dark:bg-amber-700 dark:hover:bg-amber-600 text-white dark:text-stone-950 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded transition-colors shadow-sm dark:shadow-[0_0_15px_rgba(217,119,6,0.2)] dark:hover:shadow-[0_0_20px_rgba(217,119,6,0.4)] text-center">
                            Request Quote
                        </button>
                        <button class="flex-1 bg-stone-100 hover:bg-stone-200 dark:bg-transparent dark:hover:bg-transparent border border-stone-300 dark:border-stone-700 hover:border-amber-700 dark:hover:border-amber-600/50 text-stone-800 dark:text-stone-300 hover:text-amber-800 dark:hover:text-amber-500 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded transition-colors text-center">
                            View Work
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
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

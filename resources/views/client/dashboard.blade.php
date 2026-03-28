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

        <!-- Active Requests Panel -->
        @if($clientBookings->count() > 0)
        <div class="mb-16">
            <h2 class="text-xs font-bold tracking-widest text-amber-700 dark:text-amber-500 uppercase flex items-center mb-6">
                <span class="w-4 h-[1px] bg-amber-600 mr-3"></span> Your Active Jobs
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($clientBookings as $booking)
                <div class="glass-card rounded-lg p-5 border-l-4 {{ $booking->status == 'completed' ? 'border-l-stone-500' : 'border-l-amber-500 dark:border-l-amber-600' }} shadow-sm">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-amber-700 dark:text-amber-500 uppercase tracking-widest px-2 py-1 bg-amber-50 dark:bg-amber-900/20 rounded border border-amber-100 dark:border-none">{{ str_replace('_', ' ', $booking->status) }}</span>
                        <span class="text-[10px] text-stone-400 dark:text-stone-500 uppercase font-bold tracking-wider">{{ \Carbon\Carbon::parse($booking->scheduled_date)->format('M d') }}</span>
                    </div>
                    <h4 class="font-bold text-stone-900 dark:text-stone-100 mb-2 truncate">with {{ $booking->artisan->user->name }}</h4>
                    <p class="text-xs text-stone-500 dark:text-stone-400 line-clamp-2 mb-4 leading-relaxed">{{ $booking->description }}</p>
                    
                    @if($booking->status === 'artisan_approved')
                    <div class="bg-amber-50 dark:bg-amber-900/10 border border-amber-200 dark:border-amber-800/30 rounded p-4 mb-4">
                        <div class="text-[10px] font-bold uppercase tracking-widest text-amber-700 dark:text-amber-500 mb-1">Final Proposed Terms</div>
                        <div class="text-sm font-bold text-stone-900 dark:text-stone-100 mb-2">${{ number_format($booking->price, 2) }}</div>
                        <p class="text-xs text-stone-600 dark:text-stone-400 italic">"{{ $booking->final_terms }}"</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('booking.client.decline', $booking->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-800 dark:text-stone-200 text-[10px] font-bold uppercase tracking-widest py-3 rounded transition-colors shadow-sm">Decline Terms</button>
                        </form>
                        <form action="{{ route('booking.client.approve', $booking->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-bold uppercase tracking-widest py-3 rounded transition-colors shadow-sm">Accept & Hire</button>
                        </form>
                    </div>
                    @elseif($booking->status === 'artisan_completed')
                    <button onclick="document.getElementById('rating-modal-{{$booking->id}}').classList.remove('hidden')" class="w-full bg-amber-600 hover:bg-amber-500 text-white text-[10px] font-bold uppercase tracking-widest py-2 rounded transition-colors shadow-sm">Verify Work</button>
                    
                    <!-- Rating Modal -->
                    <div id="rating-modal-{{$booking->id}}" class="fixed inset-0 z-[100] hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
                        <div class="relative w-full max-w-sm mx-4 glass-card rounded-xl p-6 shadow-2xl z-10 text-center">
                            <h3 class="font-heading text-xl font-bold text-stone-900 dark:text-stone-100 mb-2">Rate {{ $booking->artisan->user->name }}</h3>
                            <p class="text-xs text-stone-500 mb-6">Your review helps the community find trusted artisans.</p>
                            <form action="{{ route('booking.client.verify', $booking->id) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-xs font-bold text-left uppercase text-stone-600 dark:text-stone-400 mb-2">Rating (1-5)</label>
                                    <input type="number" name="rating" min="1" max="5" value="5" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-3 text-sm focus:outline-none focus:border-amber-500 transition-colors">
                                </div>
                                <div class="mb-6">
                                    <label class="block text-xs font-bold text-left uppercase text-stone-600 dark:text-stone-400 mb-2">Review (Optional)</label>
                                    <textarea name="review" rows="3" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-3 text-sm focus:outline-none focus:border-amber-500 transition-colors"></textarea>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button" onclick="document.getElementById('rating-modal-{{$booking->id}}').classList.add('hidden')" class="flex-1 bg-stone-200 dark:bg-stone-800 text-stone-800 dark:text-stone-200 text-xs font-bold uppercase tracking-widest py-3 rounded">Cancel</button>
                                    <button type="submit" class="flex-1 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold uppercase tracking-widest py-3 rounded shadow-sm">Submit Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @elseif($booking->status === 'completed')
                    <div class="w-full border border-stone-200 dark:border-stone-800 text-center text-emerald-600 dark:text-emerald-500 text-[10px] font-bold uppercase tracking-widest py-2 rounded bg-stone-50 dark:bg-stone-900/50">Done ({{ $booking->rating }} ★)</div>
                    @else
                    <div class="w-full border border-stone-200 dark:border-stone-800 text-center text-stone-500 dark:text-stone-400 text-[10px] font-bold uppercase tracking-widest py-2 rounded bg-stone-50 dark:bg-stone-900/50">Awaiting Update</div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Available Now Ribbon -->
        <div class="mb-8 flex items-center justify-between border-b border-stone-200 dark:border-stone-800 pb-4">
            <h2 class="text-xs font-bold tracking-widest text-stone-500 dark:text-stone-400 uppercase flex items-center">
                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-3 animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.4)] dark:shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span> Available Now
            </h2>
            <span class="text-xs text-stone-500 italic">Showing active artisans ready for hire</span>
        </div>

        <!-- Rich Artisan Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-20">
            @foreach($artisans as $artisanUser)
            <div class="glass-card rounded-lg p-6 flex flex-col sm:flex-row gap-6 hover:border-amber-700/40 dark:hover:border-amber-600/40 transition-colors shadow-md dark:shadow-lg group">
                
                <!-- Left: Profile & Mini Portfolio -->
                <div class="w-full sm:w-1/3 flex flex-col gap-3">
                    @php $images = $artisanUser->artisan->portfolioImages; @endphp
                    
                    @if($images->count() > 0)
                        <!-- Main Image -->
                        <div class="aspect-square rounded bg-stone-200 dark:bg-stone-800 w-full relative overflow-hidden group-hover:glow-amber transition-all border border-stone-300 dark:border-stone-800">
                            <img src="{{ asset('storage/' . $images[0]->image_path) }}" class="w-full h-full object-cover" alt="Portfolio main">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-3">
                            @if($images->count() > 1)
                                <div class="aspect-square rounded w-full border border-stone-300 dark:border-stone-800 overflow-hidden">
                                    <img src="{{ asset('storage/' . $images[1]->image_path) }}" class="w-full h-full object-cover" alt="Portfolio piece">
                                </div>
                            @else
                                <div class="aspect-square rounded portfolio-placeholder-2 w-full border border-stone-300 dark:border-stone-800"></div>
                            @endif
                            
                            @if($images->count() > 2)
                                <div class="aspect-square rounded w-full border border-stone-300 dark:border-stone-800 overflow-hidden relative">
                                    <img src="{{ asset('storage/' . $images[2]->image_path) }}" class="w-full h-full object-cover" alt="Portfolio piece">
                                    @if($images->count() > 3)
                                        <div class="absolute inset-0 bg-stone-900/60 flex items-center justify-center">
                                            <span class="text-white font-bold text-lg">+{{ $images->count() - 3 }}</span>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="aspect-square rounded portfolio-placeholder-3 w-full border border-stone-300 dark:border-stone-800"></div>
                            @endif
                        </div>
                    @else
                        <!-- Placeholder Fallback -->
                        <div class="aspect-square rounded portfolio-placeholder-1 w-full relative overflow-hidden group-hover:glow-amber transition-all border border-stone-300 dark:border-stone-800">
                            <div class="absolute inset-0 flex items-center justify-center opacity-30 dark:opacity-20 text-stone-900 dark:text-stone-100">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="aspect-square rounded portfolio-placeholder-2 w-full border border-stone-300 dark:border-stone-800"></div>
                            <div class="aspect-square rounded portfolio-placeholder-3 w-full border border-stone-300 dark:border-stone-800"></div>
                        </div>
                    @endif
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
                            @if($artisanUser->artisan->is_available)
                                <div class="bg-emerald-100 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800/50 px-3 py-1 text-[10px] font-bold tracking-widest uppercase rounded whitespace-nowrap flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>Available</div>
                            @else
                                <div class="bg-stone-100 dark:bg-stone-800 text-stone-500 dark:text-stone-400 border border-stone-300 dark:border-stone-700 px-3 py-1 text-[10px] font-bold tracking-widest uppercase rounded whitespace-nowrap">Busy / Booked</div>
                            @endif
                        </div>
                        <p class="text-stone-600 dark:text-stone-400 text-sm leading-relaxed mt-4 italic line-clamp-3">
                            "{{ $artisanUser->artisan->bio ?? 'Passionate artisan dedicated to high-quality craftsmanship.' }}"
                        </p>
                    </div>

                    <div class="flex gap-4 mt-6">
                        @php
                            $hasActiveRequest = $clientBookings->where('artisan_id', $artisanUser->artisan->artisan_id)->whereNotIn('status', ['canceled', 'completed'])->isNotEmpty();
                        @endphp
                        
                        @if($hasActiveRequest)
                        <button class="flex-1 bg-stone-300 dark:bg-stone-800 text-stone-500 dark:text-stone-500 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded cursor-not-allowed text-center">
                            Request Pending
                        </button>
                        @elseif($artisanUser->artisan->is_available)
                        <button onclick="document.getElementById('quote-modal-{{$artisanUser->id}}').classList.remove('hidden')" class="flex-1 bg-amber-700 hover:bg-amber-800 dark:bg-amber-700 dark:hover:bg-amber-600 text-white dark:text-stone-950 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded transition-colors shadow-sm dark:shadow-[0_0_15px_rgba(217,119,6,0.2)] dark:hover:shadow-[0_0_20px_rgba(217,119,6,0.4)] text-center">
                            Request Quote
                        </button>
                        @else
                        <button class="flex-1 bg-stone-300 dark:bg-stone-800 text-stone-500 dark:text-stone-500 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded cursor-not-allowed text-center">
                            Unavailable
                        </button>
                        @endif
                        <button class="flex-1 bg-stone-100 hover:bg-stone-200 dark:bg-transparent dark:hover:bg-transparent border border-stone-300 dark:border-stone-700 hover:border-amber-700 dark:hover:border-amber-600/50 text-stone-800 dark:text-stone-300 hover:text-amber-800 dark:hover:text-amber-500 text-xs font-bold tracking-widest uppercase py-3 px-2 rounded transition-colors text-center">
                            View Work
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Quote Modals -->
    @foreach($artisans as $artisanUser)
    @if($artisanUser->artisan->is_available)
    <div id="quote-modal-{{$artisanUser->id}}" class="fixed inset-0 z-[100] hidden items-center justify-center flex">
        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
        <div class="relative w-full max-w-lg mx-4 glass-card rounded-2xl p-8 shadow-2xl z-10">
            <h3 class="font-heading text-2xl font-bold text-stone-900 dark:text-stone-100 mb-2">Request Quote from {{ $artisanUser->name }}</h3>
            <p class="text-sm text-stone-500 mb-6">Describe your project requirements and preferred timeline.</p>
            
            <form action="{{ route('booking.store', $artisanUser->id) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 dark:text-stone-400 mb-2">Project Description</label>
                    <textarea name="description" rows="4" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-amber-500 transition-colors" placeholder="I need a custom oak dining table..." required></textarea>
                </div>
                <div class="mb-8">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 dark:text-stone-400 mb-2">Desired Timeline (Date)</label>
                    <input type="date" name="scheduled_date" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-amber-500 transition-colors" required>
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="document.getElementById('quote-modal-{{$artisanUser->id}}').classList.add('hidden')" class="flex-1 px-4 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-800 dark:text-stone-200 text-xs font-bold uppercase tracking-widest rounded transition-colors">Cancel</button>
                    <button type="submit" class="flex-1 px-4 py-3 bg-amber-700 hover:bg-amber-800 text-stone-50 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-sm">Send Request</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach

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

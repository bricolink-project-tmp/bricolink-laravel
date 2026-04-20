<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $artisanUser->name }} - Artisan Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
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
        .glow-amber { box-shadow: 0 0 15px rgba(180, 83, 9, 0.15); }
        .dark .glass-card { background: rgba(28, 25, 23, 0.7); border: 1px solid rgba(120, 113, 108, 0.2); }
        .dark .glow-amber { box-shadow: 0 0 20px rgba(217, 119, 6, 0.15); }
        .dark .glow-amber-text { text-shadow: 0 0 10px rgba(217, 119, 6, 0.3); }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 selection:bg-amber-700 selection:text-white transition-colors duration-300">
    <nav class="fixed w-full z-50 glass-card border-b border-stone-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-stone-500 hover:text-amber-700 transition-colors group">
                    <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span class="font-bold tracking-widest uppercase text-xs">Back to feed</span>
                </a>
                <div class="flex items-center space-x-6">
                    <button id="theme-toggle" type="button" class="text-stone-500 hover:text-amber-600 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    <span class="hidden sm:inline-block text-sm text-stone-500">Welcome, {{ explode(' ', $user->name)[0] }}</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card rounded-2xl p-8 lg:p-12 shadow-sm mb-12 relative overflow-hidden">
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl text-gray-500"></div>
            <div class="flex flex-col md:flex-row gap-8 items-start relative z-10">
                <div class="w-full md:w-2/3">
                    <h1 class="font-heading text-4xl md:text-5xl font-bold text-stone-900">{{ $artisanUser->name }}</h1>
                    <p class="text-amber-700 text-sm font-bold tracking-widest uppercase mt-2">{{ $artisanUser->artisan->craft_type }}</p>
                    <div class="mt-6">
                        <p class="text-stone-600 text-lg leading-relaxed content-bio mb-8">
                            {{ $artisanUser->artisan->bio ?? 'Passionate artisan dedicated to high-quality craftsmanship.' }}
                        </p>
                    </div>
                </div>
                <!-- Action section (Right) -->
                <div class="w-full md:w-1/3">
                    @php
                        $completedWithRatings = $artisanUser->artisan->bookings->whereNotNull('rating');
                        $avgRating = $completedWithRatings->count() > 0 ? round($completedWithRatings->avg('rating'), 1) : 'New';
                        $reviewCount = $completedWithRatings->count();
                    @endphp
                    <div class="glass-card rounded-xl p-6 bg-stone-50 border border-stone-200">
                        <div class="flex items-center justify-between mb-4 pb-4 border-b border-stone-200">
                            <div>
                                <h3 class="text-xs font-bold tracking-widest uppercase text-stone-500 mb-1">Community Rating</h3>
                                <div class="font-heading text-2xl font-bold text-stone-900 flex items-center gap-2">
                                    {{ $avgRating }} @if($avgRating !== 'New')<span class="text-amber-500 text-xl shadow-amber-500">★</span>@endif
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-stone-900">{{ $reviewCount }}</div>
                                <div class="text-[10px] uppercase font-bold tracking-widest text-stone-500">Reviews</div>
                            </div>
                        </div>
                        @php
                            $hasActiveRequest = false;
                            if (auth()->check() && $artisanUser->artisan->bookings) {
                                $hasActiveRequest = $artisanUser->artisan->bookings->where('user_id', auth()->id())->whereNotIn('status', ['canceled', 'completed', 'rejected_by_artisan', 'rejected_by_client', 'archived'])->isNotEmpty();
                            }
                        @endphp
                        @if($hasActiveRequest)
                            <button class="w-full bg-stone-300 text-stone-500 text-xs font-bold tracking-widest uppercase py-4 rounded cursor-not-allowed text-center block" disabled>
                                Request Pending
                            </button>
                        @elseif($artisanUser->artisan->is_available)
                            <button onclick="document.getElementById('quote-modal').classList.remove('hidden')" class="w-full bg-amber-700 hover:bg-amber-800 text-white text-xs font-bold tracking-widest uppercase py-4 rounded transition-colors shadow-sm text-center block">
                                Request Quote
                            </button>
                        @else
                            <button class="w-full bg-stone-300 text-stone-500 text-xs font-bold tracking-widest uppercase py-4 rounded cursor-not-allowed text-center block" disabled>
                                Artisan is Busy
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-xs font-bold tracking-widest text-stone-500 uppercase mb-6 flex items-center">
            <span class="w-4 h-[1px] bg-amber-600 mr-3"></span> Craft Gallery
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($artisanUser->artisan->portfolioImages as $image)
            <div class="relative group aspect-[4/5] rounded-xl overflow-hidden border border-stone-200 shadow-sm">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Portfolio piece from {{ $artisanUser->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            @empty
            <div class="col-span-full py-16 text-center text-stone-500 border-2 border-dashed border-stone-200 rounded-xl">
                <p>No portfolio images uploaded yet.</p>
            </div>
            @endforelse
        </div>
    </main>

    <!-- Quote Modal -->
    @if($artisanUser->artisan->is_available)
    <div id="quote-modal" class="fixed inset-0 z-[100] hidden items-center justify-center flex">
        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
        <div class="relative w-full max-w-lg mx-4 glass-card rounded-2xl p-8 shadow-2xl z-10">
            <h3 class="font-heading text-2xl font-bold text-stone-900 mb-2">Request Quote from {{ $artisanUser->name }}</h3>
            <p class="text-sm text-stone-500 mb-6">Describe your project requirements and preferred timeline.</p>
            
            <form action="{{ route('booking.store', $artisanUser->id) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2">Project Description</label>
                    <textarea name="description" rows="4" class="w-full bg-stone-50 border border-stone-200 rounded p-4 text-sm text-stone-800 focus:outline-none focus:border-amber-500 transition-colors" placeholder="I need a custom oak dining table..." required></textarea>
                </div>
                <div class="mb-8">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2">Desired Timeline (Date)</label>
                    <input type="date" name="scheduled_date" class="w-full bg-stone-50 border border-stone-200 rounded p-4 text-sm text-stone-800 focus:outline-none focus:border-amber-500 transition-colors" required>
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="document.getElementById('quote-modal').classList.add('hidden')" class="flex-1 px-4 py-3 bg-stone-200 hover:bg-stone-300 text-stone-800 text-xs font-bold uppercase tracking-widest rounded transition-colors">Cancel</button>
                    <button type="submit" class="flex-1 px-4 py-3 bg-amber-700 hover:bg-amber-800 text-stone-50 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-sm">Send Request</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        if (document.documentElement.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }
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

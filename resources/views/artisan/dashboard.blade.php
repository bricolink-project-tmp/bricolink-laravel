<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studio Command Center - Artisan</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Theme Script -->
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
        .kanban-col { background: rgba(245, 245, 244, 0.6); border: 1px dashed rgba(214, 211, 209, 0.8); }
        
        /* Dark Mode Classes */
        .dark .glass-card { background: rgba(28, 25, 23, 0.7); border: 1px solid rgba(120, 113, 108, 0.2); }
        .dark .glow-amber { box-shadow: 0 0 20px rgba(217, 119, 6, 0.15); }
        .dark .glow-amber-text { text-shadow: 0 0 15px rgba(217, 119, 6, 0.4); }
        .dark .kanban-col { background: rgba(28, 25, 23, 0.4); border: 1px dashed rgba(120, 113, 108, 0.3); }
        
        /* Toggle Switch styling */
        .toggle-checkbox { right: auto; left: 2px; border-color: #a8a29e; }
        .dark .toggle-checkbox { border-color: #57534e; }
        .toggle-checkbox:checked { right: 0; left: auto; border-color: #d97706; transform: translateX(0); }
        .toggle-checkbox:checked + .toggle-label { background-color: #9a3412; box-shadow: inset 0 0 10px rgba(217,119,6,0.5); border-color: #d97706; }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-900 dark:bg-[#0c0a09] dark:text-[#d6d3d1] selection:bg-amber-700 selection:text-white pb-20 transition-colors duration-300">

    <!-- Premium Navbar -->
    <nav class="fixed w-full z-50 glass-card border-b border-stone-200 dark:border-b-0 dark:border-stone-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading text-2xl font-bold tracking-tight text-amber-700 dark:text-amber-500 dark:glow-amber-text">Artisan <span class="text-stone-700 dark:text-stone-300 italic font-light">Studio</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Settings Link -->
                    <a href="{{ route('artisan.settings') }}" class="text-stone-500 dark:text-stone-400 hover:text-amber-600 dark:hover:text-amber-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </a>
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
    <main class="pt-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Session Alerts -->
        @if (session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Header & Availability Switch -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-8">
            <div>
                <h1 class="text-amber-700 dark:text-amber-500 dark:glow-amber-text text-xs font-bold tracking-widest uppercase mb-2">Command Center</h1>
                <h2 class="font-heading text-4xl font-bold text-stone-900 dark:text-stone-100">Your Impact Pipeline</h2>
            </div>
            
            @php $isProfileIncomplete = empty(trim($user->artisan->bio)) || $user->artisan->craft_type === 'Not Specified'; @endphp
            
            @if($isProfileIncomplete)
            <!-- Locked Availability Switch -->
            <div class="glass-card p-4 flex items-center gap-6 rounded-lg border border-stone-200 dark:border-stone-800 bg-stone-100 dark:bg-stone-900/50 opacity-80 cursor-not-allowed">
                <div class="text-right">
                    <div class="text-stone-400 dark:text-stone-500 text-sm font-bold uppercase tracking-widest leading-tight flex items-center justify-end gap-2">
                        <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Profile Incomplete
                    </div>
                    <div class="text-stone-400 text-[10px] uppercase font-bold tracking-widest mt-1">Action Required</div>
                </div>
                <!-- Toggle UI (Locked) -->
                <div class="relative inline-block w-14 mr-2 align-middle select-none transition duration-200 ease-in pointer-events-none opacity-50">
                    <input type="checkbox" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-stone-200 dark:bg-stone-400 border-4 appearance-none z-10 top-0.5" disabled/>
                    <label class="toggle-label block overflow-hidden h-7 rounded-full bg-stone-300 dark:bg-stone-700"></label>
                </div>
            </div>
            @else
            <!-- Glowing Availability Switch (Triggers Modal) -->
            <div id="availability-trigger" class="glass-card p-4 flex items-center gap-6 rounded-lg border border-stone-200 dark:border-stone-800 hover:border-amber-400 dark:hover:border-amber-700/50 transition-colors cursor-pointer {{ $user->artisan->is_available ? 'glow-amber border-amber-200 dark:border-amber-900/30 bg-amber-50 dark:bg-amber-900/10' : '' }}">
                <div class="text-right pointer-events-none">
                    <div class="text-sm font-bold uppercase tracking-widest leading-tight {{ $user->artisan->is_available ? 'text-amber-700 dark:text-amber-500' : 'text-stone-500 dark:text-stone-400' }}">Available For Hire</div>
                    <div class="text-stone-500 text-xs">{{ $user->artisan->is_available ? 'Visible in client feed' : 'Hidden from clients' }}</div>
                </div>
                <!-- Toggle UI (Visual Only, input is pointer-events-none) -->
                <div class="relative inline-block w-14 mr-2 align-middle select-none transition duration-200 ease-in pointer-events-none">
                    <input type="checkbox" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-stone-100 dark:bg-stone-300 border-4 appearance-none z-10 top-0.5 transition-transform" {{ $user->artisan->is_available ? 'checked' : '' }}/>
                    <label class="toggle-label block overflow-hidden h-7 rounded-full bg-stone-200 dark:bg-stone-800 border border-stone-300 dark:border-stone-700 shadow-inner"></label>
                </div>
            </div>
            @endif
        </div>

        <!-- Impact KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="glass-card rounded-lg p-6 border border-stone-200 dark:border-stone-800 hover:border-amber-400 dark:hover:border-amber-700/50 transition-colors relative overflow-hidden group shadow-sm dark:shadow-none">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/10 dark:bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-500/20 dark:group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-500 dark:text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">Profile Views (7d)</div>
                <div class="font-heading text-4xl font-bold text-amber-700 dark:text-amber-500 dark:glow-amber-text mb-2">1,248</div>
                <div class="text-emerald-600 dark:text-emerald-500 text-xs font-bold">+14.5% vs last week</div>
            </div>
            <div class="glass-card rounded-lg p-6 border border-stone-200 dark:border-stone-800 hover:border-amber-400 dark:hover:border-amber-700/50 transition-colors relative overflow-hidden group shadow-sm dark:shadow-none">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/10 dark:bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-500/20 dark:group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-500 dark:text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">New Inquiries</div>
                <div class="font-heading text-4xl font-bold text-stone-900 dark:text-stone-100 mb-2">4</div>
                <div class="text-stone-500 text-xs">Awaiting your response</div>
            </div>
            <div class="glass-card rounded-lg p-6 border border-stone-200 dark:border-stone-800 hover:border-amber-400 dark:hover:border-amber-700/50 transition-colors relative overflow-hidden group shadow-sm dark:shadow-none">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/10 dark:bg-amber-600/10 rounded-full blur-xl group-hover:bg-amber-500/20 dark:group-hover:bg-amber-600/20 transition-all"></div>
                <div class="text-stone-500 dark:text-stone-400 text-xs font-bold uppercase tracking-widest mb-2">Client Rating</div>
                @php
                    $completedWithRatings = $user->artisan->bookings->whereNotNull('rating');
                    $avgRating = $completedWithRatings->count() > 0 ? round($completedWithRatings->avg('rating'), 1) : 'New';
                    $reviewCount = $completedWithRatings->count();
                @endphp
                <div class="font-heading text-4xl font-bold text-stone-900 dark:text-stone-100 mb-2 flex items-center gap-2">
                    {{ $avgRating }} @if($avgRating !== 'New')<span class="text-amber-500 text-2xl">★</span>@endif
                </div>
                <div class="text-stone-500 text-xs">Based on {{ $reviewCount }} verified reviews</div>
            </div>
        </div>

        <!-- Lead Pipeline (Kanban Lite) -->
        @php
            $pendingJobs = $user->artisan->bookings->where('status', 'pending');
            $discussionJobs = $user->artisan->bookings->whereIn('status', ['in_discussion', 'artisan_approved']);
            $bookedJobs = $user->artisan->bookings->whereIn('status', ['booked', 'artisan_completed']);
            
            // Re-calculate new inquiries for KPI card based on real data
            $newInquiriesCount = $pendingJobs->count();
            
            // Re-calculate Rating KPI if we wanted, but not needed for this replacement.
        @endphp
        <h3 class="text-xs font-bold tracking-widest text-stone-500 dark:text-stone-400 uppercase mb-6 flex items-center">
            <span class="w-4 h-[1px] bg-amber-600 mr-3"></span> Active Job Pipeline
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Col 1: New Offers -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-800 dark:text-stone-200">New Inquiries</span>
                    <span class="bg-amber-100 text-amber-800 dark:bg-amber-600 dark:text-stone-950 border border-amber-200 dark:border-none text-xs font-bold px-2 py-0.5 rounded">{{ $pendingJobs->count() }}</span>
                </div>
                
                @forelse($pendingJobs as $job)
                <div class="glass-card rounded-lg bg-white dark:bg-stone-900/90 shadow-sm dark:shadow-none p-4 mb-4 border-l-4 border-l-amber-500 dark:border-l-amber-600 transition-transform">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-amber-700 dark:text-amber-500 uppercase tracking-widest px-2 py-1 bg-amber-50 dark:bg-amber-900/20 rounded border border-amber-100 dark:border-none">Quote Request</span>
                        <span class="text-[10px] text-stone-400 dark:text-stone-500 uppercase font-bold tracking-wider">{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                    </div>
                    <div class="flex items-center gap-2 mb-3 border-b border-stone-100 dark:border-stone-800 pb-3">
                        <div class="w-6 h-6 rounded-full bg-stone-100 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-[9px] flex items-center justify-center font-bold text-amber-700 dark:text-amber-500">{{ substr($job->user->name, 0, 2) }}</div>
                        <span class="text-xs font-bold text-stone-900 dark:text-stone-100">{{ $job->user->name }}</span>
                    </div>
                    <p class="text-xs text-stone-500 dark:text-stone-400 line-clamp-3 mb-4 leading-relaxed">"{{ $job->description }}"</p>
                    <div class="flex gap-2">
                        <form action="{{ route('booking.artisan.status', $job->id) }}" method="POST" class="flex-1">
                            @csrf
                            <input type="hidden" name="status" value="canceled">
                            <button type="submit" class="w-full bg-stone-100 hover:bg-stone-200 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-500 dark:text-stone-400 text-[10px] font-bold uppercase tracking-widest py-2 rounded transition-colors shadow-sm">Decline</button>
                        </form>
                        <form action="{{ route('booking.artisan.status', $job->id) }}" method="POST" class="flex-[2]">
                            @csrf
                            <input type="hidden" name="status" value="in_discussion">
                            <button type="submit" class="w-full bg-amber-100 hover:bg-amber-200 dark:bg-amber-900/30 dark:hover:bg-amber-800/50 text-amber-800 dark:text-amber-500 text-[10px] font-bold uppercase tracking-widest py-2 rounded transition-colors border border-amber-200 dark:border-amber-800/50 shadow-sm">Chat / Negotiate</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="h-32 flex flex-col items-center justify-center text-stone-400 dark:text-stone-600 border border-stone-300 dark:border-stone-800/50 rounded-lg border-dashed mt-4 bg-stone-50/50 dark:bg-transparent">
                    <span class="text-xs uppercase tracking-widest font-bold">No new leads</span>
                </div>
                @endforelse
            </div>

            <!-- Col 2: In Discussion -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-800 dark:text-stone-200">In Discussion</span>
                    <span class="bg-stone-200 text-stone-700 dark:bg-stone-700 dark:text-stone-300 text-xs font-bold px-2 py-0.5 rounded">{{ $discussionJobs->count() }}</span>
                </div>
                
                @forelse($discussionJobs as $job)
                <div class="glass-card rounded-lg bg-white dark:bg-stone-900/90 shadow-sm dark:shadow-none p-4 mb-4 border-l-4 border-l-stone-500 transition-transform">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-stone-600 dark:text-stone-400 uppercase tracking-widest px-2 py-1 bg-stone-100 dark:bg-stone-800 rounded border border-stone-200 dark:border-none">Active Chat</span>
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-5 h-5 rounded-full bg-stone-100 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-[8px] flex items-center justify-center font-bold text-stone-500">{{ substr($job->user->name, 0, 2) }}</div>
                        <span class="text-xs font-bold text-stone-900 dark:text-stone-100">{{ $job->user->name }}</span>
                    </div>
                    <p class="text-xs text-stone-500 dark:text-stone-400 line-clamp-1 mb-4 italic">"{{ $job->description }}"</p>
                    
                    <div class="border-t border-stone-100 dark:border-stone-800 pt-3">
                        @if($job->status === 'artisan_approved')
                            <div class="w-full bg-stone-100 dark:bg-stone-800 text-stone-500 dark:text-stone-400 text-center text-[10px] font-bold uppercase tracking-widest py-2 rounded border border-stone-200 dark:border-stone-700 shadow-inner">Waiting for Client</div>
                        @else
                            <button type="button" onclick="document.getElementById('terms-modal-{{$job->id}}').classList.remove('hidden')" class="w-full bg-stone-800 hover:bg-stone-900 dark:bg-stone-200 dark:hover:bg-white text-stone-50 dark:text-stone-900 text-[10px] font-bold uppercase tracking-widest py-2 rounded transition-colors shadow-sm">Send Final Terms</button>
                        @endif
                    </div>
                </div>
                @empty
                <div class="h-32 flex flex-col items-center justify-center text-stone-400 dark:text-stone-600 border border-stone-300 dark:border-stone-800/50 rounded-lg border-dashed mt-4 bg-stone-50/50 dark:bg-transparent">
                    <span class="text-xs uppercase tracking-widest font-bold">No active chats</span>
                </div>
                @endforelse
            </div>

            <!-- Col 3: Booked Jobs -->
            <div class="kanban-col rounded-lg p-4 h-full min-h-[400px]">
                <div class="flex items-center justify-between mb-6 px-2">
                    <span class="text-sm font-bold text-stone-800 dark:text-stone-200">Booked Jobs</span>
                    <span class="bg-emerald-100 text-emerald-800 dark:bg-emerald-600 dark:text-stone-50 text-xs font-bold px-2 py-0.5 border border-emerald-200 dark:border-none rounded">{{ $bookedJobs->count() }}</span>
                </div>
                
                @forelse($bookedJobs as $job)
                <div class="glass-card rounded-lg bg-white dark:bg-stone-900/90 shadow-sm dark:shadow-none p-4 mb-4 border-l-4 border-l-emerald-500 dark:border-l-emerald-600 transition-transform">
                    <div class="flex justify-between items-start mb-3">
                        <span class="text-[10px] font-bold text-emerald-700 dark:text-emerald-500 uppercase tracking-widest px-2 py-1 bg-emerald-50 dark:bg-emerald-900/20 rounded border border-emerald-100 dark:border-none">Active Work</span>
                        <span class="text-[10px] text-stone-400 dark:text-stone-500 uppercase font-bold tracking-wider">Due {{ \Carbon\Carbon::parse($job->scheduled_date)->format('M d') }}</span>
                    </div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-bold text-stone-900 dark:text-stone-100">For {{ $job->user->name }}</span>
                    </div>
                    
                    <div class="border-t border-stone-100 dark:border-stone-800 pt-3">
                        @if($job->status === 'artisan_completed')
                            <div class="w-full bg-emerald-50 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 text-center text-[10px] font-bold uppercase tracking-widest py-2 rounded shadow-inner">Delivered / Awaiting Pay</div>
                        @else
                            <form action="{{ route('booking.artisan.status', $job->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="artisan_completed">
                                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-[10px] font-bold uppercase tracking-widest py-2 rounded transition-colors shadow-sm dark:shadow-[0_0_10px_rgba(16,185,129,0.3)]">Mark Job Complete</button>
                            </form>
                        @endif
                    </div>
                </div>
                @empty
                <div class="h-32 flex flex-col items-center justify-center text-stone-400 dark:text-stone-600 border border-stone-300 dark:border-stone-800/50 rounded-lg border-dashed mt-4 bg-stone-50/50 dark:bg-transparent">
                    <span class="text-xs uppercase tracking-widest font-bold">No active builds</span>
                </div>
                @endforelse
            </div>

        </div>

        <!-- Portfolio Grid Full Width -->
        <h3 class="text-xs font-bold tracking-widest text-stone-500 dark:text-stone-400 uppercase mb-6 mt-16 flex items-center">
            <span class="w-4 h-[1px] bg-amber-600 mr-3"></span> Your Craft Gallery
        </h3>

        <div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <!-- Existing Images -->
                @foreach($user->artisan->portfolioImages as $image)
                <div class="relative group aspect-square rounded-lg overflow-hidden border border-stone-200 dark:border-stone-800">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Portfolio piece" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-stone-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <form action="{{ route('artisan.portfolio.delete', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white hover:text-red-400 transition-colors p-2" title="Delete image">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach

                <!-- Upload Form Zone -->
                <form action="{{ route('artisan.portfolio.upload') }}" method="POST" enctype="multipart/form-data" class="aspect-square glass-card rounded-lg flex flex-col items-center justify-center text-center hover:border-amber-500 hover:bg-stone-50 dark:hover:bg-stone-900/50 transition-colors cursor-pointer group border-dashed border-2 relative">
                    @csrf
                    <input type="file" name="portfolio_image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="this.form.submit()">
                    <div class="w-12 h-12 rounded-full bg-stone-100 dark:bg-stone-800 flex items-center justify-center mb-3 group-hover:bg-amber-100 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-6 h-6 text-stone-400 group-hover:text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <h4 class="font-heading text-lg font-bold text-stone-900 dark:text-stone-200">Add Photo</h4>
                    <p class="text-stone-500 text-[10px] uppercase font-bold tracking-widest mt-1">Max 5MB</p>
                </form>
            </div>
        </div>

    </main>

    <!-- Availability Confirmation Modal -->
    <div id="availability-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm" id="availability-backdrop"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-sm">
            <div class="glass-card rounded-xl p-8 shadow-2xl mx-4 text-center">
                <div class="w-16 h-16 mx-auto bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-amber-600 dark:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-heading text-2xl font-bold text-stone-900 dark:text-stone-100 mb-2">Change Availability?</h3>
                <p class="text-sm text-stone-600 dark:text-stone-400 mb-8">
                    {{ $user->artisan->is_available ? 'You will be hidden from the Client Discovery Feed and will not receive new requests.' : 'You will become visible on the Client Discovery Feed and can receive new job requests.' }}
                </p>
                <form action="{{ route('artisan.availability.toggle') }}" method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <button type="button" id="close-availability" class="flex-1 px-4 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-800 dark:text-stone-200 text-xs font-bold uppercase tracking-widest rounded transition-colors">Cancel</button>
                        <button type="submit" class="flex-1 px-4 py-3 bg-amber-600 hover:bg-amber-700 text-stone-50 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-sm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($isProfileIncomplete)
    <!-- Forced Onboarding Wizard -->
    <div class="fixed inset-0 z-[200] flex items-center justify-center">
        <!-- Intense Backdrop blur so they can barely see the dashboard -->
        <div class="absolute inset-0 bg-stone-900/80 backdrop-blur-md"></div>
        <div class="relative w-full max-w-lg mx-4 z-10 scale-100 transition-transform">
            <div class="glass-card rounded-2xl p-10 shadow-2xl text-center border-amber-500/30 glow-amber bg-white dark:bg-stone-900">
                <div class="w-20 h-20 mx-auto bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center mb-6 shadow-inner">
                    <svg class="w-10 h-10 text-amber-600 dark:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <h2 class="font-heading text-4xl font-bold text-stone-900 dark:text-stone-100 mb-4 dark:glow-amber-text">Welcome to the Studio</h2>
                <p class="text-stone-600 dark:text-stone-400 leading-relaxed mb-8">
                    Your command center is almost ready. Before you can activate your availability and start receiving quoting requests from clients, you must first define your true <strong>Craft Category</strong> and write your <strong>Professional Bio</strong>.
                </p>
                <a href="{{ route('artisan.settings') }}" class="inline-block w-full px-8 py-4 bg-amber-700 hover:bg-amber-800 text-stone-50 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-md hover:shadow-lg dark:shadow-[0_0_15px_rgba(217,119,6,0.2)] dark:hover:shadow-[0_0_20px_rgba(217,119,6,0.4)] relative overflow-hidden group">
                    <div class="absolute inset-0 bg-white/20 w-0 group-hover:w-full transition-all duration-300"></div>
                    <span class="relative">Set Up Profile Now</span>
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Final Terms Negotiator Modals -->
    @foreach($user->artisan->bookings as $job)
    @if(in_array($job->status, ['in_discussion']))
    <div id="terms-modal-{{$job->id}}" class="fixed inset-0 z-[100] hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-sm" onclick="this.parentElement.classList.add('hidden')"></div>
        <div class="relative w-full max-w-md mx-4 glass-card rounded-2xl p-8 shadow-2xl z-10">
            <h3 class="font-heading text-2xl font-bold text-stone-900 dark:text-stone-100 mb-2">Propose Final Deal</h3>
            <p class="text-sm text-stone-500 mb-6">Set your final price and terms for {{ $job->user->name }}. They will receive these to review before they officially hire you.</p>
            
            <form action="{{ route('booking.artisan.status', $job->id) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="artisan_approved">
                
                <div class="mb-5">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 dark:text-stone-400 mb-2">Total Price ($)</label>
                    <input type="number" name="price" step="0.01" min="0" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-amber-500 transition-colors" placeholder="e.g. 450.00" required>
                </div>
                <div class="mb-8">
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 dark:text-stone-400 mb-2">Final Details & Timeline</label>
                    <textarea name="final_terms" rows="4" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded p-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-amber-500 transition-colors" placeholder="Includes materials. Start date: Nov 12th. Timeline: 2 weeks..." required></textarea>
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="document.getElementById('terms-modal-{{$job->id}}').classList.add('hidden')" class="flex-1 px-4 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-800 dark:text-stone-200 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-none">Cancel</button>
                    <button type="submit" class="flex-1 px-4 py-3 bg-amber-700 hover:bg-amber-800 text-stone-50 text-xs font-bold uppercase tracking-widest rounded transition-colors shadow-sm">Send Terms</button>
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

        // Availability Modal Logic
        const availabilityModal = document.getElementById('availability-modal');
        const availabilityTrigger = document.getElementById('availability-trigger');
        if (availabilityTrigger && availabilityModal) {
            availabilityTrigger.addEventListener('click', () => availabilityModal.classList.remove('hidden'));
            document.getElementById('close-availability').addEventListener('click', () => availabilityModal.classList.add('hidden'));
            document.getElementById('availability-backdrop').addEventListener('click', () => availabilityModal.classList.add('hidden'));
        }
    </script>
</body>
</html>

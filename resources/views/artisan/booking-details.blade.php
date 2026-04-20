<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Details - Artisan Platform</title>
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
<body class="antialiased bg-stone-50 text-stone-900 dark:bg-[#0c0a09] dark:text-[#d6d3d1] selection:bg-amber-700 selection:text-white pb-32 md:pb-12 pt-24 md:pt-32 transition-colors duration-300">

    <nav class="fixed top-0 w-full z-50 glass-card border-b border-stone-200 dark:border-b-0 dark:border-stone-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading text-2xl font-bold tracking-tight text-stone-900 dark:text-stone-100">Artisan <span class="text-amber-700 dark:text-amber-600 italic font-normal">Hub</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-stone-500 dark:text-stone-400 hover:text-amber-600 dark:hover:text-amber-400 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <span class="hidden sm:inline-block text-sm text-stone-500 dark:text-stone-400">Welcome, <span class="text-stone-900 dark:text-stone-200">{{ explode(' ', Auth::user()->name)[0] }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-500 dark:text-stone-400 hover:text-amber-700 dark:hover:text-amber-500 transition-colors">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-6 lg:px-8">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mb-6 text-sm" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif

        <header class="mb-12 mt-8 md:mt-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div>
                <a href="{{ route('dashboard') }}" class="text-stone-500 hover:text-amber-600 dark:hover:text-amber-500 text-sm flex items-center gap-2 mb-6 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Dashboard
                </a>
                <div class="flex items-center gap-3 mb-2">
                    <span class="bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-500 text-xs font-bold px-3 py-1 rounded uppercase tracking-widest">{{ str_replace('_', ' ', $booking->status) }}</span>
                    <span class="text-stone-400 dark:text-stone-500 text-sm font-bold tracking-wider">{{ $booking->reference_id }}</span>
                </div>
                <h1 class="font-heading text-4xl md:text-5xl text-stone-900 dark:text-stone-100 tracking-tight">{{ $booking->title ?? 'Custom Request' }}</h1>
            </div>
            <div class="flex items-center gap-4 bg-white dark:bg-stone-900/50 p-4 rounded-xl border border-stone-200 dark:border-stone-800">
            @if($booking->user->profile_pic)
                <img src="{{ asset('storage/' . $booking->user->profile_pic) }}" alt="Profile" class="w-12 h-12 rounded-full object-cover border border-stone-200 dark:border-stone-700">
            @else
                <div class="w-12 h-12 rounded-full bg-stone-100 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-sm flex items-center justify-center font-bold text-stone-500">{{ substr($booking->user->name, 0, 2) }}</div>
            @endif
                <div>
                    <div class="text-[10px] text-stone-500 dark:text-stone-400 uppercase font-bold tracking-widest mb-0.5">Client</div>
                    <div class="font-bold text-stone-900 dark:text-stone-100 text-sm">{{ $booking->user->name }}</div>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            
            <div class="md:col-span-2 space-y-8">
                <!-- Request Description -->
                <section class="glass-card rounded-xl p-8 md:p-10 shadow-sm relative z-10">
                    <h2 class="font-heading text-2xl text-stone-900 dark:text-stone-100 mb-6 border-b border-stone-200 dark:border-stone-800 pb-4">Vision & Requirements</h2>
                    <p class="text-stone-600 dark:text-stone-400 leading-relaxed whitespace-pre-wrap">{{ $booking->description }}</p>
                </section>

                <!-- References Gallery -->
                @if($booking->reference_images && count($booking->reference_images) > 0)
                <section class="glass-card rounded-xl p-8 md:p-10 shadow-sm">
                    <h2 class="font-heading text-2xl text-stone-900 dark:text-stone-100 mb-6 border-b border-stone-200 dark:border-stone-800 pb-4">Inspiration Images</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($booking->reference_images as $imagePath)
                            <a href="{{ asset('storage/' . $imagePath) }}" target="_blank" class="block aspect-square rounded-lg overflow-hidden bg-stone-100 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 group cursor-zoom-in relative">
                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Reference Image" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/20 transition-colors flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white opacity-0 group-hover:opacity-100 transition-opacity drop-shadow-md">open_in_new</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- Chat Interface -->
                @if(in_array($booking->status, ['in_discussion', 'artisan_approved', 'booked', 'artisan_completed', 'completed', 'canceled', 'archived', 'rejected_by_client', 'rejected_by_artisan']))
                <section class="glass-card rounded-xl shadow-sm flex flex-col h-[500px] border border-stone-200 dark:border-stone-800 relative z-20">
                    <div class="p-4 border-b border-stone-200 dark:border-stone-800 bg-stone-50/50 dark:bg-stone-900/50 rounded-t-xl">
                        <h2 class="font-heading text-lg text-stone-900 dark:text-stone-100 flex items-center gap-2">
                            <span class="material-symbols-outlined text-amber-600">forum</span> Deal Room Chat
                        </h2>
                    </div>
                    
                    <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-stone-50/30 dark:bg-[#0c0a09]/30">
                        <div class="flex justify-center items-center h-full">
                            <div class="w-6 h-6 border-2 border-amber-600 border-t-transparent rounded-full animate-spin"></div>
                        </div>
                    </div>

                    @if(in_array($booking->status, ['in_discussion', 'artisan_approved', 'booked']))
                    <div class="p-4 border-t border-stone-200 dark:border-stone-800 bg-white dark:bg-stone-900/90 rounded-b-xl">
                        <form id="chat-form" class="flex gap-2">
                            <input type="text" id="chat-input" class="flex-1 bg-stone-100 dark:bg-stone-800 border-none rounded-lg px-4 py-2 text-sm focus:ring-1 focus:ring-amber-500 text-stone-900 dark:text-stone-100 placeholder:text-stone-500 transition-shadow" placeholder="Type your message..." autocomplete="off">
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white p-2 rounded-lg transition-colors flex items-center justify-center disabled:opacity-50" id="chat-submit">
                                <span class="material-symbols-outlined text-[20px]">send</span>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="p-4 border-t border-stone-200 dark:border-stone-800 bg-stone-100 dark:bg-stone-900/50 rounded-b-xl text-center text-[10px] text-stone-500 font-bold uppercase tracking-widest">
                        Chat is closed
                    </div>
                    @endif
                </section>
                @endif
            </div>

            <!-- Logistics Sidebar -->
            <div class="space-y-6">
                <section class="bg-stone-100 dark:bg-stone-900/50 rounded-xl p-6 md:p-8 border border-stone-200 dark:border-stone-800">
                    <h3 class="font-heading text-xl text-stone-900 dark:text-stone-100 mb-6 border-b border-stone-200 dark:border-stone-800 pb-3">Logistics</h3>
                    
                    <div class="space-y-5">
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-1">Target Date</div>
                            <div class="font-bold text-stone-900 dark:text-stone-100 flex items-center gap-2">
                                <span class="material-symbols-outlined text-amber-600 dark:text-amber-500 text-lg">calendar_month</span>
                                {{ \Carbon\Carbon::parse($booking->scheduled_date)->format('F j, Y') }}
                            </div>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-1">Proposed Budget</div>
                            <div class="font-bold text-stone-900 dark:text-stone-100 flex items-center gap-2">
                                <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-500 text-lg">payments</span>
                                {{ $booking->budget_range ?? 'Not specified' }}
                            </div>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-1">Delivery Location</div>
                            <div class="font-bold text-stone-900 dark:text-stone-100 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sky-600 dark:text-sky-500 text-lg">location_on</span>
                                {{ $booking->location ?? 'Not specified' }}
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Actions -->
                @if($booking->status === 'pending')
                <div class="glass-card rounded-xl p-6 border-t-4 border-t-amber-500">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-4">Response Actions</h3>
                    
                    <form action="{{ route('booking.artisan.status', $booking->id) }}" method="POST" class="mb-3">
                        @csrf
                        <input type="hidden" name="status" value="in_discussion">
                        <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white dark:text-stone-950 text-sm font-bold uppercase tracking-widest py-3 px-4 rounded transition-colors shadow-sm dark:shadow-[0_0_15px_rgba(217,119,6,0.2)] flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">forum</span> Accept & Negotiate
                        </button>
                    </form>
                    
                    <form action="{{ route('booking.artisan.status', $booking->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="rejected_by_artisan">
                        <button type="submit" class="w-full bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-600 dark:text-stone-400 text-xs font-bold uppercase tracking-widest py-3 px-4 rounded transition-colors">
                            Decline Request
                        </button>
                    </form>
                </div>
                @elseif($booking->status === 'in_discussion')
                    <div class="glass-card rounded-xl p-6 border-t-4 border-t-amber-500 shadow-sm relative z-20">
                        <h3 class="text-[10px] font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-4">Propose Final Quote</h3>
                        <form action="{{ route('booking.artisan.status', $booking->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="status" value="artisan_approved">
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-stone-600 dark:text-stone-400 mb-1">Final Price ($)</label>
                                <input type="number" name="price" step="0.01" min="0" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-amber-500 transition-colors text-stone-900 dark:text-stone-100" required>
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-stone-600 dark:text-stone-400 mb-1">Terms & Conditions</label>
                                <textarea name="final_terms" rows="3" class="w-full bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-amber-500 transition-colors text-stone-900 dark:text-stone-100" placeholder="Timeline, inclusions, materials..." required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold uppercase tracking-widest py-3 px-4 rounded text-[10px] transition-colors shadow-sm flex justify-center items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">request_quote</span> Send Formal Quote
                            </button>
                        </form>
                    </div>
                @elseif($booking->status === 'artisan_approved')
                    <div class="glass-card rounded-xl p-6 border border-amber-200 dark:border-amber-800/50 bg-amber-50/50 dark:bg-amber-900/10">
                        <div class="flex items-center gap-3 text-amber-700 dark:text-amber-500 mb-2">
                            <span class="material-symbols-outlined text-2xl">hourglass_empty</span>
                            <h3 class="text-[10px] font-bold uppercase tracking-widest">Waiting for Client</h3>
                        </div>
                        <p class="text-xs text-stone-600 dark:text-stone-400">You proposed a final price of <strong class="text-stone-900 dark:text-stone-100">${{ number_format($booking->price, 2) }}</strong>. Waiting for the client to accept and book.</p>
                    </div>
                @elseif($booking->status === 'booked')
                    <div class="glass-card rounded-xl p-6 border-t-4 border-t-emerald-500 bg-emerald-50/30 dark:bg-emerald-900/10">
                        <h3 class="text-[10px] font-bold uppercase tracking-widest text-emerald-700 dark:text-emerald-500 mb-2">Job is Active</h3>
                        <p class="text-[11px] text-stone-600 dark:text-stone-400 mb-4 leading-relaxed">When you have completed the work and delivered it to the client, mark it as finished here.</p>
                        <form action="{{ route('booking.artisan.status', $booking->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="artisan_completed">
                            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold uppercase tracking-widest py-3 px-4 rounded text-[10px] transition-colors shadow-sm flex justify-center items-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">task_alt</span> Mark Job Complete
                            </button>
                        </form>
                    </div>
                @elseif($booking->status === 'artisan_completed')
                    <div class="glass-card rounded-xl p-6 border border-emerald-200 dark:border-emerald-800/50 bg-emerald-50/50 dark:bg-emerald-900/10">
                        <div class="flex items-center gap-3 text-emerald-700 dark:text-emerald-500 mb-2">
                            <span class="material-symbols-outlined text-2xl">hourglass_empty</span>
                            <h3 class="text-[10px] font-bold uppercase tracking-widest">Waiting for Verification</h3>
                        </div>
                        <p class="text-[11px] text-stone-600 dark:text-stone-400">You marked this job as completed. Waiting for the client to verify and leave a review.</p>
                    </div>
                @elseif($booking->status === 'completed')
                    <div class="glass-card rounded-xl p-6 border-l-4 border-l-emerald-500 bg-white dark:bg-stone-900/50">
                        <h3 class="text-[10px] font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 mb-4">Final Verdict</h3>
                        <div class="text-center">
                            <div class="text-3xl text-emerald-500 mb-1 font-bold">{{ $booking->rating }} ★</div>
                            <div class="text-[10px] uppercase font-bold text-stone-400 tracking-widest">Client Rating</div>
                        </div>
                    </div>
                @elseif($booking->status === 'rejected_by_client')
                    <div class="glass-card rounded-xl p-6 border border-red-200 dark:border-red-800/50 bg-red-50/50 dark:bg-red-900/10">
                        <div class="flex items-center gap-3 text-red-700 dark:text-red-500 mb-2">
                            <span class="material-symbols-outlined text-2xl">cancel</span>
                            <h3 class="text-[10px] font-bold uppercase tracking-widest">Declined by Client</h3>
                        </div>
                        <p class="text-[11px] text-stone-600 dark:text-stone-400 mb-4">The client declined your formal quote of <strong class="text-stone-900 dark:text-stone-100">${{ number_format($booking->price, 2) }}</strong>.</p>
                        <form action="{{ route('booking.artisan.status', $booking->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="archived">
                            <button type="submit" class="w-full bg-stone-200 hover:bg-stone-300 dark:bg-stone-800 dark:hover:bg-stone-700 text-stone-700 dark:text-stone-300 font-bold uppercase tracking-widest py-2 rounded text-[10px] transition-colors">Archive</button>
                        </form>
                    </div>
                @endif
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

        // Chat Logic
        const bookingId = {{ $booking->id }};
        const currentUserId = {{ Auth::id() }};
        const chatMessages = document.getElementById('chat-messages');
        const chatForm = document.getElementById('chat-form');
        const chatInput = document.getElementById('chat-input');
        const chatSubmit = document.getElementById('chat-submit');
        let lastMessageCount = 0;

        function fetchMessages() {
            if(!chatMessages) return;
            
            fetch(`/api/booking/${bookingId}/messages`)
                .then(res => res.json())
                .then(data => {
                    if (data.error) return;
                    
                    if (data.length !== lastMessageCount) {
                        renderMessages(data);
                        lastMessageCount = data.length;
                        scrollToBottom();
                    }
                })
                .catch(err => console.error(err));
        }

        function renderMessages(messages) {
            chatMessages.innerHTML = '';
            if (messages.length === 0) {
                chatMessages.innerHTML = '<div class="h-full flex items-center justify-center text-xs text-stone-500 uppercase tracking-widest font-bold">No messages yet. Start the conversation!</div>';
                return;
            }

            messages.forEach(msg => {
                const isMe = msg.sender_id === currentUserId;
                const wrapper = document.createElement('div');
                wrapper.className = `flex ${isMe ? 'justify-end' : 'justify-start'}`;
                
                const bubble = document.createElement('div');
                bubble.className = `max-w-[75%] rounded-2xl px-4 py-2 text-sm shadow-sm ${
                    isMe 
                    ? 'bg-amber-600 text-white rounded-br-none' 
                    : 'bg-white dark:bg-stone-800 text-stone-800 dark:text-stone-200 border border-stone-200 dark:border-stone-700 rounded-bl-none'
                }`;
                bubble.textContent = msg.message;
                
                wrapper.appendChild(bubble);
                chatMessages.appendChild(wrapper);
            });
        }

        function scrollToBottom() {
            if(chatMessages) chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        if (chatForm) {
            chatForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const msg = chatInput.value.trim();
                if (!msg) return;

                chatInput.disabled = true;
                chatSubmit.disabled = true;

                fetch(`/api/booking/${bookingId}/messages`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: msg })
                })
                .then(res => res.json())
                .then(data => {
                    chatInput.value = '';
                    chatInput.disabled = false;
                    chatSubmit.disabled = false;
                    chatInput.focus();
                    fetchMessages();
                })
                .catch(err => {
                    console.error(err);
                    chatInput.disabled = false;
                    chatSubmit.disabled = false;
                });
            });
        }

        // Poll every 3 seconds if chat exists
        if(chatMessages) {
            fetchMessages();
            setInterval(fetchMessages, 3000);
        }
    </script>
</body>
</html>

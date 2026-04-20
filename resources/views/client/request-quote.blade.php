<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commission a Unique Piece - Artisan</title>
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
<body class="antialiased bg-stone-50 text-stone-900 selection:bg-amber-700 selection:text-white pb-32 md:pb-12 pt-24 md:pt-32 transition-colors duration-300">

    <!-- Premium Navbar (Consistent with Dashboard) -->
    <nav class="fixed top-0 w-full z-50 glass-card border-b border-stone-200 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading text-2xl font-bold tracking-tight text-stone-900">Artisan <span class="text-amber-700 italic font-normal">Discover</span></span>
                </a>
                <div class="flex items-center space-x-6">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-stone-500 hover:text-amber-600 focus:outline-none transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <span class="hidden sm:inline-block text-sm text-stone-500">Welcome, <span class="text-stone-900">{{ explode(' ', $user->name)[0] }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold tracking-widest uppercase text-stone-500 hover:text-amber-700 transition-colors">Sign Out</button>
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

        <header class="mb-16 md:mb-24 mt-8 md:mt-12">
            <a href="{{ route('dashboard') }}" class="text-stone-500 hover:text-amber-600 text-sm flex items-center gap-2 mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-stone-900 tracking-tight mb-4">Commission a Unique Piece</h1>
            <p class="text-lg md:text-xl text-stone-600 max-w-2xl leading-relaxed">Share your vision and request a quote from <strong>{{ $artisanUser->name }}</strong>.</p>
        </header>

        <form action="{{ route('booking.store', $artisanUser->id) }}" method="POST" enctype="multipart/form-data" class="space-y-16 md:space-y-24">
            @csrf
            
            <!-- Section 1: Vision -->
            <section class="glass-card rounded-xl p-8 md:p-12 shadow-sm relative z-10">
                <h2 class="font-heading text-2xl text-stone-900 mb-8 border-b border-stone-200 pb-4">Project Vision</h2>
                <div class="space-y-8">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2" for="title">Project Title</label>
                        <input class="w-full bg-stone-50 border-none border-b border-stone-300 rounded-none px-4 py-3 focus:ring-0 focus:border-b-2 focus:border-amber-600 transition-all text-stone-900 placeholder:text-stone-400" id="title" name="title" placeholder="e.g., Walnut Dining Table for 12" type="text" required value="{{ old('title') }}"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2" for="description">Detailed Description</label>
                        <textarea class="w-full bg-stone-50 border-none border-b border-stone-300 rounded-none px-4 py-3 focus:ring-0 focus:border-b-2 focus:border-amber-600 transition-all text-stone-900 placeholder:text-stone-400 resize-y" id="description" name="description" placeholder="Describe the materials, style, dimensions, and any specific requirements..." rows="5" required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </section>

            <!-- Section 2: Logistics -->
            <section class="bg-stone-100 rounded-xl p-8 md:p-12 border border-stone-200">
                <h2 class="font-heading text-2xl text-stone-900 mb-8 border-b border-stone-200 pb-4">Logistics & Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2" for="budget_range">Proposed Budget / Price</label>
                        <input class="w-full bg-white border-none border-b border-stone-300 rounded-none px-4 py-3 focus:ring-0 focus:border-b-2 focus:border-amber-600 transition-all text-stone-900 placeholder:text-stone-400" id="budget_range" name="budget_range" placeholder="e.g. $5,000" type="text" value="{{ old('budget_range') }}"/>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2" for="scheduled_date">Desired Completion Date</label>
                        <input class="w-full bg-white border-none border-b border-stone-300 rounded-none px-4 py-3 focus:ring-0 focus:border-b-2 focus:border-amber-600 transition-all text-stone-900" id="scheduled_date" name="scheduled_date" type="date" required value="{{ old('scheduled_date') }}"/>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-600 mb-2" for="location">Delivery Location (City, Country)</label>
                        <input class="w-full bg-white border-none border-b border-stone-300 rounded-none px-4 py-3 focus:ring-0 focus:border-b-2 focus:border-amber-600 transition-all text-stone-900 placeholder:text-stone-400" id="location" name="location" placeholder="e.g., London, UK" type="text" value="{{ old('location') }}"/>
                    </div>
                </div>
            </section>

            <!-- Section 3: Inspirations -->
            <section class="glass-card rounded-xl p-8 md:p-12 shadow-sm">
                <div class="flex justify-between items-end mb-8 border-b border-stone-200 pb-4">
                    <h2 class="font-heading text-2xl text-stone-900">Inspirations & References</h2>
                    <span class="text-xs font-bold uppercase tracking-widest text-stone-400">Optional</span>
                </div>
                <p class="text-stone-600 mb-6">Upload images of materials, room layouts, or stylistic references to help the artisan understand your aesthetic.</p>
                
                <div class="border-2 border-dashed border-stone-300 rounded-xl p-12 text-center hover:bg-stone-50 transition-colors cursor-pointer group relative">
                    <input type="file" name="references[]" multiple accept="image/jpeg,image/png,image/jpg" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" id="file-upload">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-stone-100 mb-4 group-hover:bg-amber-100 transition-colors">
                        <span class="material-symbols-outlined text-3xl text-stone-400 group-hover:text-amber-600">cloud_upload</span>
                    </div>
                    <h3 class="font-heading text-lg text-stone-900 mb-2">Drag & Drop Files Here</h3>
                    <p class="text-sm text-stone-500">or click to browse from your device</p>
                    <p class="text-xs text-stone-400 mt-4">JPG, PNG up to 5MB each. Maximum 3 files.</p>
                    <div id="file-list" class="mt-4 text-xs font-bold text-amber-700"></div>
                </div>
            </section>

            <!-- Submit Section -->
            <div class="pt-8 flex justify-end">
                <button type="submit" class="bg-amber-700 hover:bg-amber-800 text-stone-50 text-sm font-bold tracking-widest uppercase px-8 py-4 rounded transition-colors shadow-md hover:shadow-lg flex items-center gap-3">
                    Submit Inquiry
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </form>
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

        // Simple file list display
        document.getElementById('file-upload').addEventListener('change', function(e) {
            const list = document.getElementById('file-list');
            list.innerHTML = '';
            
            let files = Array.from(this.files);
            
            if (files.length > 3) {
                alert('You can only upload a maximum of 3 reference images.');
                this.value = ''; // Clear selection
                return;
            }

            let valid = true;
            files.forEach(file => {
                if (file.size > 5 * 1024 * 1024) {
                    alert(`File ${file.name} is larger than 5MB.`);
                    valid = false;
                }
            });

            if (!valid) {
                this.value = '';
                return;
            }

            if (files.length > 0) {
                list.innerHTML = files.length + ' file(s) selected';
            }
        });
    </script>
</body>
</html>

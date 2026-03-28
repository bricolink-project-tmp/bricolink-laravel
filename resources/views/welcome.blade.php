<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Artisan Platform') }} - Home</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Using Playfair Display for a crafted, elegant artisan feel on headings, and Lato for readable body text -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Lato', sans-serif; }
        h1, h2, h3, h4, .font-heading { font-family: 'Playfair Display', serif; }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d6d3d1' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="antialiased bg-stone-50 text-stone-800 selection:bg-amber-600 selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-stone-50/90 backdrop-blur-md border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-10 w-auto rounded shadow-sm">
                    <span class="font-heading font-bold text-2xl tracking-tight text-stone-900">{{ config('app.name', 'ArtisanPlatform') }}</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-sm font-bold tracking-wider text-stone-600 hover:text-amber-700 transition uppercase">Home</a>
                    <a href="#features" class="text-sm font-bold tracking-wider text-stone-600 hover:text-amber-700 transition uppercase">How It Works</a>
                    <a href="#about" class="text-sm font-bold tracking-wider text-stone-600 hover:text-amber-700 transition uppercase">About Us</a>
                    <a href="#contact" class="text-sm font-bold tracking-wider text-stone-600 hover:text-amber-700 transition uppercase">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-sm font-bold tracking-wider text-stone-600 hover:text-amber-700 transition uppercase">Sign in</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 text-sm font-bold tracking-wider text-stone-50 bg-amber-700 hover:bg-amber-800 rounded shadow-sm transition-all uppercase">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 bg-pattern border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 border border-amber-800/20 text-amber-800 text-sm font-bold tracking-widest uppercase mb-8 bg-amber-50/50">
                Connecting the community
            </div>
            <h1 class="text-5xl md:text-7xl font-heading font-bold text-stone-900 mb-6 leading-tight">
                Find skilled artisans <br class="hidden md:block" />
                <span class="text-amber-700 italic">in your neighborhood</span>
            </h1>
            <p class="mt-6 text-xl text-stone-600 max-w-2xl mx-auto mb-12 leading-relaxed">
                Whether you need a master carpenter, a precise electrician, or a creative painter, our platform connects you with reliable, local craftsmen ready to help build and repair.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('register', ['role' => 'client']) }}" class="px-8 py-4 text-sm font-bold tracking-wider uppercase text-stone-50 bg-stone-900 hover:bg-stone-800 rounded shadow-sm transition-all w-full sm:w-auto">
                    Find an Artisan
                </a>
                <a href="{{ route('register', ['role' => 'artisan']) }}" class="px-8 py-4 text-sm font-bold tracking-wider uppercase text-stone-900 bg-transparent border-2 border-stone-900 hover:bg-stone-900 hover:text-stone-50 rounded transition-all w-full sm:w-auto">
                    Join as a Professional
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white relative border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <!-- Add the animated logo here -->
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('images/logo_animation.gif') }}" alt="Artisan Logo Animation" class="h-28 w-auto">
                </div>
                <h2 class="text-amber-700 font-bold tracking-widest uppercase text-sm mb-3">How It Works</h2>
                <h3 class="text-3xl md:text-4xl font-heading font-bold text-stone-900">Your trusted service network</h3>
                <div class="w-24 h-1 bg-amber-700 mx-auto mt-6 mb-6"></div>
                <p class="text-lg text-stone-600">We make it simple to hire the right person for the job while supporting local talent.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-stone-50 p-10 border border-stone-200 hover:border-amber-700 transition-colors group">
                    <div class="w-16 h-16 bg-stone-200 rounded flex items-center justify-center mb-6 group-hover:bg-amber-100 transition-colors">
                        <svg class="w-8 h-8 text-stone-700 group-hover:text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h4 class="font-heading text-2xl font-bold text-stone-900 mb-4">Discover Talent</h4>
                    <p class="text-stone-600 leading-relaxed">Browse profiles, read reviews from your neighbors, and compare portfolios to choose the perfect artisan for your specific needs.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-stone-50 p-10 border border-stone-200 hover:border-amber-700 transition-colors group">
                    <div class="w-16 h-16 bg-stone-200 rounded flex items-center justify-center mb-6 group-hover:bg-amber-100 transition-colors">
                        <svg class="w-8 h-8 text-stone-700 group-hover:text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="font-heading text-2xl font-bold text-stone-900 mb-4">Easy Scheduling</h4>
                    <p class="text-stone-600 leading-relaxed">Contact artisans directly through our platform, discuss project details, and schedule appointments at your convenience.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-stone-50 p-10 border border-stone-200 hover:border-amber-700 transition-colors group">
                    <div class="w-16 h-16 bg-stone-200 rounded flex items-center justify-center mb-6 group-hover:bg-amber-100 transition-colors">
                        <svg class="w-8 h-8 text-stone-700 group-hover:text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h4 class="font-heading text-2xl font-bold text-stone-900 mb-4">Community Driven</h4>
                    <p class="text-stone-600 leading-relaxed">We focus on building a sustainable, non-profit ecosystem that uplifts local workers and provides fair opportunities for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-stone-900 text-stone-100 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:flex items-center justify-between gap-16">
                <div class="lg:w-2/3 mb-12 lg:mb-0">
                    <h2 class="text-amber-500 font-bold tracking-widest uppercase text-sm mb-3">Our Mission</h2>
                    <h3 class="font-heading text-4xl md:text-5xl font-bold mb-8 text-white">About Us</h3>
                    <div class="w-16 h-1 bg-amber-600 mb-8"></div>
                    <p class="text-stone-300 text-lg leading-relaxed mb-6 font-light">
                        We are a small group of passionate students who believe in the power of local communities and genuine craftsmanship. We noticed how difficult it was for talented, independent artisans to find consistent work, and how hard it was for people to find trustworthy help for their homes.
                    </p>
                    <p class="text-stone-300 text-lg leading-relaxed mb-10 font-light">
                        That's why we decided to build this non-profit artisan platform. Our goal isn't to make money from hardworking professionals; our goal is strictly to provide a free tool that brings our community closer together, empowering skilled workers to thrive while helping neighbors get the job done right.
                    </p>
                    <div class="border-l-4 border-amber-600 pl-6 py-2">
                        <p class="font-heading text-2xl font-bold text-white mb-1 italic">"Built by students, for the community."</p>
                        <p class="text-stone-400 font-bold tracking-widest uppercase text-sm mt-3">Non-Profit Initiative</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-stone-100">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-amber-700 font-bold tracking-widest uppercase text-sm mb-3">Get in Touch</h2>
            <h3 class="font-heading text-3xl md:text-4xl font-bold text-stone-900">Contact Us</h3>
            <div class="w-24 h-1 bg-amber-700 mx-auto mt-6 mb-8"></div>
            <p class="text-lg text-stone-600 max-w-xl mx-auto mb-12">
                Whether you're an artisan wanting to join, or a community member with questions, we would love to hear from you.
            </p>
            
            <div class="bg-white p-10 border border-stone-200">
                <!-- Email -->
                <div class="mb-10">
                    <p class="text-sm font-bold tracking-widest text-stone-400 uppercase mb-4">Email Us</p>
                    <a href="mailto:hello@artisanplatform.org" class="font-heading text-2xl md:text-3xl font-bold text-stone-900 hover:text-amber-700 transition-colors">
                        hello@artisanplatform.org
                    </a>
                </div>
                
                <!-- Socials -->
                <div>
                    <p class="text-sm font-bold tracking-widest text-stone-400 uppercase mb-6">Follow our journey</p>
                    <div class="flex items-center justify-center gap-6">
                        <a href="#" class="w-12 h-12 border border-stone-300 text-stone-600 rounded flex items-center justify-center hover:bg-stone-900 hover:text-white hover:border-stone-900 transition-all">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-12 h-12 border border-stone-300 text-stone-600 rounded flex items-center justify-center hover:bg-stone-900 hover:text-white hover:border-stone-900 transition-all">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        </a>
                        <a href="#" class="w-12 h-12 border border-stone-300 text-stone-600 rounded flex items-center justify-center hover:bg-stone-900 hover:text-white hover:border-stone-900 transition-all">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 border-t border-stone-800 py-12 text-stone-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Artisan Platform Logo" class="h-8 w-auto rounded shadow-sm">
                <span class="font-heading font-bold text-xl text-stone-100">{{ config('app.name', 'ArtisanPlatform') }}</span>
            </div>
            <p class="text-xs uppercase tracking-widest font-bold">
                &copy; {{ date('Y') }} Artisan Platform. A non-profit student initiative.
            </p>
        </div>
    </footer>

</body>
</html>
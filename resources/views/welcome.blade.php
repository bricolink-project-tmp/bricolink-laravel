<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Artisan Platform') }} - Home</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800 selection:bg-indigo-500 selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        {{ substr(config('app.name', 'A'), 0, 1) }}
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-slate-900">{{ config('app.name', 'ArtisanPlatform') }}</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">Home</a>
                    <a href="#features" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">Features</a>
                    <a href="#about" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">About Us</a>
                    <a href="#contact" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">Sign in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-full shadow-md shadow-indigo-200 transition-all hover:shadow-lg hover:-translate-y-0.5">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-sm font-medium mb-8">
                <span class="flex h-2 w-2 rounded-full bg-indigo-600"></span>
                Connecting the community
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-8 leading-tight">
                Find skilled artisans <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">in your neighborhood</span>
            </h1>
            <p class="mt-4 text-xl text-slate-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Whether you need a plumber, electrician, carpenter, or painter, our platform connects you with reliable, local craftsmen ready to help with your projects.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{ route('register') }}" class="px-8 py-4 text-base font-medium text-white bg-slate-900 hover:bg-slate-800 rounded-full shadow-xl shadow-slate-200/50 transition-all hover:shadow-2xl hover:-translate-y-1 w-full sm:w-auto">
                    Find an Artisan
                </a>
                <a href="{{ route('register') }}" class="px-8 py-4 text-base font-medium text-slate-900 bg-white border border-slate-200 hover:border-slate-300 rounded-full shadow-sm transition-all hover:bg-slate-50 w-full sm:w-auto group">
                    Join as a Professional
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-indigo-600 font-semibold tracking-wide uppercase text-sm">How It Works</h2>
                <h3 class="mt-2 text-3xl md:text-4xl font-bold text-slate-900">Your trusted service network</h3>
                <p class="mt-4 text-lg text-slate-600">We make it simple to hire the right person for the job while supporting local talent.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-indigo-100 hover:shadow-xl hover:shadow-indigo-50 transition-all group">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Discover Talent</h4>
                    <p class="text-slate-600 leading-relaxed">Browse profiles, read reviews from your neighbors, and compare portfolios to choose the perfect artisan for your specific needs.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-purple-100 hover:shadow-xl hover:shadow-purple-50 transition-all group">
                    <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Easy Scheduling</h4>
                    <p class="text-slate-600 leading-relaxed">Contact artisans directly through our platform, discuss project details, and schedule appointments at your convenience.</p>
                </div>
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-rose-100 hover:shadow-xl hover:shadow-rose-50 transition-all group">
                    <div class="w-14 h-14 bg-rose-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Community Driven</h4>
                    <p class="text-slate-600 leading-relaxed">We focus on building a sustainable, non-profit ecosystem that uplifts local workers and provides fair opportunities for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:flex items-center justify-between gap-16">
                <div class="lg:w-2/3 mb-12 lg:mb-0">
                    <h2 class="text-indigo-400 font-semibold tracking-wide uppercase text-sm mb-2">Our Mission</h2>
                    <h3 class="text-3xl md:text-5xl font-bold mb-6">About Us</h3>
                    <p class="text-slate-300 text-lg leading-relaxed mb-6">
                        We are a small group of passionate students who believe in the power of local communities. We noticed how difficult it was for talented, independent artisans to find consistent work, and how hard it was for people to find trustworthy help for their homes.
                    </p>
                    <p class="text-slate-300 text-lg leading-relaxed mb-8">
                        That's why we decided to build this non-profit artisan platform. Our goal isn't to make money from hardworking professionals; our goal is strictly to provide a free tool that brings our community closer together, empowering skilled workers to thrive while helping neighbors get the job done right.
                    </p>
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm inline-block">
                        <p class="text-xl font-bold text-white mb-1">Non-Profit Initiative</p>
                        <p class="text-slate-400 font-medium text-sm">Built by students, for the community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-indigo-600 font-semibold tracking-wide uppercase text-sm">Get in Touch</h2>
            <h3 class="mt-2 text-3xl md:text-4xl font-bold text-slate-900">Contact Us</h3>
            <p class="mt-6 text-lg text-slate-600 max-w-xl mx-auto">
                Whether you're an artisan wanting to join, or a community member with questions, we would love to hear from you.
            </p>
            
            <div class="mt-12 flex flex-col items-center justify-center space-y-8">
                <!-- Email -->
                <a href="mailto:hello@artisanplatform.org" class="inline-flex items-center gap-4 text-slate-700 hover:text-indigo-600 transition group p-4 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100">
                    <div class="w-12 h-12 bg-indigo-50 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="text-xl font-medium">hello@artisanplatform.org</span>
                </a>
                
                <!-- Socials -->
                <div>
                    <p class="text-sm font-medium text-slate-400 uppercase tracking-widest mb-4">Follow our journey</p>
                    <div class="flex items-center justify-center gap-6">
                        <a href="#" class="w-10 h-10 bg-slate-100 text-slate-500 rounded-full flex items-center justify-center hover:bg-blue-500 hover:text-white transition shadow-sm">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-100 text-slate-500 rounded-full flex items-center justify-center hover:bg-sky-400 hover:text-white transition shadow-sm">
                            <span class="sr-only">Twitter</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-100 text-slate-500 rounded-full flex items-center justify-center hover:bg-pink-600 hover:text-white transition shadow-sm">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-50 border-t border-slate-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-md">
                    {{ substr(config('app.name', 'A'), 0, 1) }}
                </div>
                <span class="font-bold text-xl text-slate-900">{{ config('app.name', 'ArtisanPlatform') }}</span>
            </div>
            <p class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} Artisan Platform. A non-profit student initiative.
            </p>
        </div>
    </footer>

</body>
</html>
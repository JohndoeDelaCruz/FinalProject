<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Contact Management System - Efficiently manage your contacts">
        
        <title>{{ config('app.name', 'Contact Management System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <!-- Hero Section -->
        <header class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
            <div class="relative z-10">
                <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="h-10 w-10 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">CMS</span>
                        </div>
                        <span class="ml-2 font-bold text-xl text-white">Contact Management System</span>
                    </div>
                    <div class="hidden md:flex space-x-4">
                        @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="font-semibold px-4 py-2 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition duration-300">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold px-4 py-2 rounded-lg bg-blue-700 hover:bg-blue-800 transition duration-300">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="font-semibold px-4 py-2 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition duration-300">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-white focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </nav>
                
                <!-- Mobile menu -->
                <div id="mobile-menu" class="hidden md:hidden bg-blue-800 p-4">
                    @if (Route::has('login'))
                        <div class="flex flex-col space-y-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold px-4 py-2 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition duration-300 text-center">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold px-4 py-2 rounded-lg bg-blue-700 hover:bg-blue-800 transition duration-300 text-center">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-semibold px-4 py-2 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition duration-300 text-center">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>

            <!-- Hero Content -->
            <div class="container mx-auto px-6 py-16 md:py-24 flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">Manage Your Contacts Seamlessly</h1>
                    <p class="text-xl md:text-2xl mb-8 text-blue-100">A powerful, easy-to-use contact management solution for individuals and small businesses.</p>
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300">Go to Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300">Get Started</a>
                            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-transparent border border-white text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Log In</a>
                        @endauth
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="https://cdn.pixabay.com/photo/2017/07/31/11/44/laptop-2557576_1280.jpg" alt="Contact Management System" class="rounded-lg shadow-xl w-full">
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Key Features</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- Feature 1 -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Organized Contact Management</h3>
                        <p class="text-gray-600">Store all your important contact information in one secure, easily accessible place.</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Detailed Records</h3>
                        <p class="text-gray-600">Track all interactions and details about your contacts with comprehensive profile views.</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Insightful Analytics</h3>
                        <p class="text-gray-600">Gain valuable insights with dashboards showing key metrics about your contact base.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">What Our Users Say</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Testimonial 1 -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                                JD
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">John Doe</h4>
                                <p class="text-gray-600 text-sm">Small Business Owner</p>
                            </div>
                        </div>
                        <p class="text-gray-700">"This CMS has completely transformed how I manage client relationships. It's intuitive and powerful!"</p>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                                JS
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Jane Smith</h4>
                                <p class="text-gray-600 text-sm">Freelance Consultant</p>
                            </div>
                        </div>
                        <p class="text-gray-700">"I've tried many contact management tools, but this one offers the perfect balance of simplicity and functionality."</p>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-xl">
                                RJ
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Robert Johnson</h4>
                                <p class="text-gray-600 text-sm">Sales Manager</p>
                            </div>
                        </div>
                        <p class="text-gray-700">"The dashboard analytics alone are worth it. I can now make data-driven decisions about my sales strategy."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 md:py-20 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8">Ready to Get Started?</h2>
                <p class="text-xl mb-10 max-w-3xl mx-auto">Join thousands of satisfied users who have transformed how they manage their contacts.</p>
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300">Go to Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300">Create Free Account</a>
                        <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-transparent border border-white text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Log In</a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'Contact Management System') }}</h3>
                        <p class="text-gray-400 max-w-md">Simplify your contact management with our powerful, user-friendly CMS solution.</p>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                        <div>
                            <h4 class="font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Features</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Testimonials</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">FAQ</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-4">Legal</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-4">Contact</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Support</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Sales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400">&copy; {{ date('Y') }} {{ config('app.name', 'Contact Management System') }}. All rights reserved.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts for mobile menu -->
        <script>
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html> 
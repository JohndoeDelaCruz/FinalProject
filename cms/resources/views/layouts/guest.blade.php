<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CMS') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col lg:flex-row">
            <!-- Left Panel (Image/Brand) -->
            <div class="hidden lg:block lg:w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 relative">
                <div class="absolute inset-0 pattern-dots pattern-blue-500 pattern-bg-transparent pattern-size-4 pattern-opacity-10"></div>
                <div class="relative z-10 flex flex-col justify-between h-full p-12">
                    <div>
                        <a href="/" class="flex items-center">
                            <x-application-logo class="h-14 w-auto" />
                        </a>
                        
                        <div class="mt-16">
                            <h2 class="text-4xl font-bold text-white">Contact Management System</h2>
                            <p class="mt-4 text-blue-100 text-lg">A powerful solution to manage your contacts efficiently and effectively.</p>
                        </div>
                        
                        <div class="mt-12 bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                            <blockquote class="text-white italic">
                                "This CMS has transformed how I manage client relationships - it's intuitive, powerful, and has all the features I need."
                            </blockquote>
                            <div class="mt-4 flex items-center">
                                <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-white font-bold">JD</span>
                                </div>
                                <div class="ml-3 text-white">
                                    <p class="font-semibold">John Doe</p>
                                    <p class="text-sm text-blue-200">Small Business Owner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-blue-200 text-sm">
                        &copy; {{ date('Y') }} Contact Management System. All rights reserved.
                    </div>
                </div>
            </div>
            
            <!-- Right Panel (Form) -->
            <div class="lg:w-1/2 flex flex-col justify-center px-8 py-12 lg:px-12 xl:px-24">
                <div class="lg:hidden mb-8 flex items-center">
                    <a href="/" class="flex items-center">
                        <x-application-logo :textColor="'text-gray-900'" class="h-12 w-auto" />
                    </a>
                </div>
                
                <div class="w-full max-w-md mx-auto">
                    {{ $slot }}
                </div>
                
                <div class="mt-8 text-center text-sm text-gray-600 lg:hidden">
                    &copy; {{ date('Y') }} Contact Management System. All rights reserved.
                </div>
            </div>
        </div>
        
        <style>
            .pattern-dots {
                background-image: radial-gradient(currentColor 1px, transparent 1px);
            }
        </style>
    </body>
</html>

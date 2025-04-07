<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('contacts.edit', $contact->id) }}" class="inline-flex items-center bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit
                </a>
                <a href="{{ route('contacts.index') }}" class="inline-flex items-center bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <!-- Profile Header -->
                    <div class="flex flex-col items-center md:flex-row md:items-start pb-6 mb-6 border-b border-gray-200">
                        <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                            <div class="flex items-center justify-center w-24 h-24 bg-blue-100 text-blue-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h1 class="text-2xl font-bold text-gray-900">{{ $contact->name }}</h1>
                            <p class="text-sm text-gray-500 mt-1">Added on {{ $contact->created_at->format('F j, Y') }}</p>
                            
                            <div class="mt-4 flex flex-wrap justify-center md:justify-start gap-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Contact
                                </span>
                                @if($contact->notes)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    Has Notes
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if($contact->email)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-medium text-gray-500">Email</span>
                                    <span class="block mt-1 text-sm text-gray-900">{{ $contact->email }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if($contact->phone)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-medium text-gray-500">Phone</span>
                                    <span class="block mt-1 text-sm text-gray-900">{{ $contact->phone }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if($contact->address)
                        <div class="bg-gray-50 rounded-lg p-4 @if(!$contact->phone && !$contact->email) md:col-span-2 @endif">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-medium text-gray-500">Address</span>
                                    <span class="block mt-1 text-sm text-gray-900">{{ $contact->address }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    @if($contact->notes)
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Notes</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 whitespace-pre-line">{{ $contact->notes }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between items-center">
                        <div class="text-sm text-gray-500">Last updated: {{ $contact->updated_at->diffForHumans() }}</div>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this contact?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Delete Contact
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
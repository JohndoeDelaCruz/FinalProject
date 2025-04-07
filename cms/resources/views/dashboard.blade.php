<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Contacts Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Contacts</h3>
                                <p class="text-2xl font-semibold text-gray-900">{{ $totalContacts }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Growth Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Monthly Growth</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">{{ $contactsThisMonth }}</p>
                                    <span class="ml-2 text-sm {{ $growthPercentage >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $growthPercentage >= 0 ? '+' : '' }}{{ $growthPercentage }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contacts with Email Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">With Email</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">{{ $contactsWithEmail }}</p>
                                    <span class="ml-2 text-sm text-gray-500">
                                        {{ $totalContacts ? round(($contactsWithEmail / $totalContacts) * 100) : 0 }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contacts with Phone Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">With Phone</h3>
                                <div class="flex items-baseline">
                                    <p class="text-2xl font-semibold text-gray-900">{{ $contactsWithPhone }}</p>
                                    <span class="ml-2 text-sm text-gray-500">
                                        {{ $totalContacts ? round(($contactsWithPhone / $totalContacts) * 100) : 0 }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Contacts Growth Chart -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <h3 class="text-base font-medium text-gray-900 mb-4">Contacts Growth Trend</h3>
                        <div>
                            <canvas id="contactsGrowthChart" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Contact Info Stats -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-5">
                        <h3 class="text-base font-medium text-gray-900 mb-4">Contact Information</h3>
                        <div>
                            <canvas id="contactInfoChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Contacts -->
            <div class="mt-6 bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-5">
                    <h3 class="text-base font-medium text-gray-900 mb-4">Recently Added Contacts</h3>
                    
                    @if($recentContacts->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added On</th>
                                        <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentContacts as $contact)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900">{{ $contact->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $contact->email ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $contact->phone ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $contact->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">No contacts added yet.</p>
                    @endif
                    
                    <div class="mt-4 text-right">
                        <a href="{{ route('contacts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Add New Contact
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Contact Growth Chart
            const monthsData = @json($months);
            const contactsData = @json($contactsByMonth);
            
            const ctx1 = document.getElementById('contactsGrowthChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: monthsData,
                    datasets: [{
                        label: 'New Contacts',
                        data: contactsData,
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            
            // Contact Info Chart
            const ctx2 = document.getElementById('contactInfoChart').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['With Email', 'Without Email', 'With Phone', 'Without Phone'],
                    datasets: [{
                        data: [
                            {{ $contactsWithEmail }}, 
                            {{ $contactsWithoutEmail }}, 
                            {{ $contactsWithPhone }}, 
                            {{ $contactsWithoutPhone }}
                        ],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.8)',
                            'rgba(79, 70, 229, 0.2)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(245, 158, 11, 0.2)'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>

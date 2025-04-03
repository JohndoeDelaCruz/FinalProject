{{-- Update your resources/views/contacts/index.blade.php file --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
            <a href="{{ route('contacts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Contact
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            {{-- Add search form --}}
            <div class="mb-6">
                <form action="{{ route('contacts.index') }}" method="GET" class="flex">
                    <div class="w-full">
                        <input type="text" name="search" placeholder="Search contacts..." 
                            class="w-full px-4 py-2 border rounded-l focus:outline-none" 
                            value="{{ $search ?? '' }}">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
                        Search
                    </button>
                    @if(isset($search) && $search)
                        <a href="{{ route('contacts.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r ml-2">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($contacts->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                        <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                        <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                                        <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td class="py-4 px-4 border-b border-gray-200">{{ $contact->name }}</td>
                                            <td class="py-4 px-4 border-b border-gray-200">{{ $contact->email ?? 'N/A' }}</td>
                                            <td class="py-4 px-4 border-b border-gray-200">{{ $contact->phone ?? 'N/A' }}</td>
                                            <td class="py-4 px-4 border-b border-gray-200">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500">
                            @if(isset($search) && $search)
                                No contacts found matching "{{ $search }}". <a href="{{ route('contacts.index') }}" class="text-blue-500">View all contacts</a>
                            @else
                                No contacts found. Add your first contact!
                            @endif
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
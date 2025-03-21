<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact Details') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit
                </a>
                <a href="{{ route('contacts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Name</h3>
                        <p class="text-gray-900">{{ $contact->name }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Email</h3>
                        <p class="text-gray-900">{{ $contact->email ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Phone</h3>
                        <p class="text-gray-900">{{ $contact->phone ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Address</h3>
                        <p class="text-gray-900">{{ $contact->address ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Notes</h3>
                        <p class="text-gray-900">{{ $contact->notes ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Created</h3>
                        <p class="text-gray-900">{{ $contact->created_at->format('F j, Y') }}</p>
                    </div>

                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="mt-6">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this contact?')">
                            Delete Contact
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
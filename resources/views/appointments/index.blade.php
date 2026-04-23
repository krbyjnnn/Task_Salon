<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Appointments
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">All Appointments</h3>
                    <a href="/appointments/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">Add New Appointment</a>
                </div>

                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="py-2 px-4">#</th>
                            <th class="py-2 px-4">Customer Name</th>
                            <th class="py-2 px-4">Contact</th>
                            <th class="py-2 px-4">Service</th>
                            <th class="py-2 px-4">Price</th>
                            <th class="py-2 px-4">Date</th>
                            <th class="py-2 px-4">Time</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $appointment)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $appointment->customer_name }}</td>
                            <td class="py-2 px-4">{{ $appointment->customer_contact }}</td>
                            <td class="py-2 px-4">{{ $appointment->service->name }}</td>
                            <td class="py-2 px-4">₱{{ number_format($appointment->service->price, 2) }}</td>
                            <td class="py-2 px-4">{{ $appointment->date }}</td>
                            <td class="py-2 px-4">{{ $appointment->time }}</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="/appointments/{{ $appointment->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                                <form action="/appointments/{{ $appointment->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
                                        onclick="return confirm('Delete this appointment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="py-4 px-4 text-center text-gray-400">No appointments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
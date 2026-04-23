<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Appointment
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="/appointments" class="text-sm text-blue-500 hover:underline">← Back to Appointments</a>

                <form action="/appointments/{{ $item->id }}" method="POST" class="mt-4 space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer Name</label>
                        <input type="text" name="customer_name" value="{{ $item->customer_name }}" autocomplete="off" required
                            class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer Contact</label>
                        <input type="text" name="customer_contact" value="{{ $item->customer_contact }}" autocomplete="off" required
                            class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service</label>
                        <select name="service_id" required
                            class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm">
                            <option value="">-- Select a Service --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $item->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }} (₱{{ number_format($service->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" name="date" value="{{ $item->date }}" required
                            class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Time</label>
                        <input type="time" name="time" value="{{ $item->time }}" required
                            class="mt-1 w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded shadow-sm">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                        Update Appointment
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
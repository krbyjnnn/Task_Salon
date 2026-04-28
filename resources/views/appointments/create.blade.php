<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Appointment
        </h2>
    </x-slot>

    <div id="form-container">
        <div class="form-box">
            <a href="/appointments" class="back-link">← Back to Appointments</a>
            <form action="/appointments" method="POST">
                @csrf

                <label>Customer Name</label>
                <input type="text" name="customer_name" autocomplete="off" required>

                <label>Customer Contact</label>
                <input type="text" name="customer_contact" autocomplete="off" required>

                <label>Service</label>
                <select name="service_id" required>
                    <option value="">-- Select a Service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }} (₱{{ number_format($service->price, 2) }})</option>
                    @endforeach
                </select>

                <label>Date</label>
                <input type="date" name="date" required>

                <label>Time</label>
                <input type="time" name="time" required>

                <button type="submit">Save Appointment</button>
            </form>
        </div>
    </div>
</x-app-layout>
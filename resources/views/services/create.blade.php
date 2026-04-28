<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Service
        </h2>
    </x-slot>

    <div id="form-container">
        <div class="form-box">
            <a href="/services" class="back-link">← Back to Services</a>
            <form action="/services" method="POST">
                @csrf
                <label>Service Name</label>
                <input type="text" name="name" autocomplete="off">

                <label>Price (₱)</label>
                <input type="number" name="price" step="0.01" autocomplete="off">

                <label>Duration</label>
                <input type="text" name="duration" placeholder="e.g. 30 mins" autocomplete="off">

                <label>Description</label>
                <textarea name="description" rows="3"></textarea>

                <button type="submit">Save Service</button>
            </form>
        </div>
    </div>
</x-app-layout>
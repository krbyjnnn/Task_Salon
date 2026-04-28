<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Service
        </h2>
    </x-slot>

    <div id="form-container">
        <div class="form-box">
            <a href="/services" class="back-link">← Back to Services</a>
            <form action="/services/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')

                <label>Service Name</label>
                <input type="text" name="name" value="{{ $item->name }}" autocomplete="off">

                <label>Price (₱)</label>
                <input type="number" name="price" step="0.01" value="{{ $item->price }}" autocomplete="off">

                <label>Duration</label>
                <input type="text" name="duration" value="{{ $item->duration }}" autocomplete="off">

                <label>Description</label>
                <textarea name="description" rows="3">{{ $item->description }}</textarea>

                <button type="submit">Update Service</button>
            </form>
        </div>
    </div>
</x-app-layout>
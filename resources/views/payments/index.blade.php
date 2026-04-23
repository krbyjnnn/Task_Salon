<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Payments
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Payment History</h3>

                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="py-2 px-4">#</th>
                            <th class="py-2 px-4">Customer Name</th>
                            <th class="py-2 px-4">Service</th>
                            <th class="py-2 px-4">Date</th>
                            <th class="py-2 px-4">Amount</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $payment)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $payment->appointment->customer_name }}</td>
                            <td class="py-2 px-4">{{ $payment->appointment->service->name }}</td>
                            <td class="py-2 px-4">{{ $payment->appointment->date }}</td>
                            <td class="py-2 px-4">₱{{ number_format($payment->amount, 2) }}</td>
                            <td class="py-2 px-4">
                                @if($payment->status == 'paid')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Paid</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Unpaid</span>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                @if($payment->status == 'unpaid')
                                    <form action="/payments/{{ $payment->id }}/pay" method="POST" style="display:inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Mark as Paid</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs">✔ Done</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-4 px-4 text-center text-gray-400">No payments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
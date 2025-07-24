@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Customers</h1>
<div class="bg-white p-6 rounded-lg shadow-lg">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Name</th>
                <th class="text-left p-2">Email</th>
                <th class="text-left p-2">Subscribed Services</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <td class="p-2">{{ $customer->name }}</td>
                <td class="p-2">{{ $customer->email }}</td>
                <td class="p-2">
                    @forelse ($customer->products as $product)
                        <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                           {{ $product->name }}
                        </span>
                    @empty
                        No services.
                    @endforelse
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-2 text-center">No customers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
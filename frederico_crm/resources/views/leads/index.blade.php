@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Leads (Calon Customer)</h1>
<div class="bg-white p-6 rounded-lg shadow-lg">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Name</th>
                <th class="text-left p-2">Email</th>
                <th class="text-left p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($leads as $lead)
            <tr>
                <td class="p-2">{{ $lead->name }}</td>
                <td class="p-2">{{ $lead->email }}</td>
                <td class="p-2">
                    <form action="{{ route('projects.store', $lead) }}" method="POST">
                        @csrf
                        <select name="product_id" class="border rounded-md">
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Create Project</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-2 text-center">No new leads available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
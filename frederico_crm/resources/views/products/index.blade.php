@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Master Produk</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Tambah Produk
    </a>
</div>

<div class="bg-white p-6 rounded-lg shadow-lg">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Nama Produk</th>
                <th class="text-left p-2">Harga</th>
                <th class="text-left p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td class="p-2">{{ $product->name }}</td>
                <td class="p-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="p-2 flex space-x-2">
                    <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-2 text-center">Belum ada produk yang ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
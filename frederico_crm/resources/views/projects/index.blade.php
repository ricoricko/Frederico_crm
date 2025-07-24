@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Projects</h1>
<div class="bg-white p-6 rounded-lg shadow-lg">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-2">Lead Name</th>
                <th class="text-left p-2">Product</th>
                <th class="text-left p-2">Sales</th>
                <th class="text-left p-2">Status</th>
                <th class="text-left p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td class="p-2">{{ $project->lead->name }}</td>
                <td class="p-2">{{ $project->product->name }}</td>
                <td class="p-2">{{ $project->user->name }}</td>
                <td class="p-2">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $project->status == 'approved' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $project->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </td>
                <td class="p-2">
                    @can('is-manager')
                        @if($project->status == 'pending')
                        <form action="{{ route('projects.approve', $project) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Approve</button>
                        </form>
                        @else
                        Approved by {{ $project->approver->name ?? '-' }}
                        @endif
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-2 text-center">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Service Provider Dashboard</h2>
    </x-slot>

    <div class="p-6">
        <p>Welcome {{ auth('provider')->user()->name }} to the Vehicle Repair System.</p>

        <!-- Pending Requests Section -->
        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Pending Requests</h2>

            @forelse($pendingRequests as $request)
                <div class="p-4 mb-4 bg-white rounded shadow">
                    <p><strong>Client:</strong> {{ $request->client->name }}</p>
                    <p><strong>Description:</strong> {{ $request->problem_description }}</p>
                    <p><strong>Location:</strong> {{ $request->location }}</p>
                    @if($request->image)
                        <img src="{{ asset('storage/' . $request->image) }}" width="120" class="mt-2">
                    @endif
                </div>
            @empty
                <p>No pending service requests.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>

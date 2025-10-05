<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold underline">SQUAWKS!</h1>
        @forelse($squawks as $squawk)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $squawk->user ? $squawk->user->name : 'Anonymous' }}</div>
                        <div class="mt-1">{{ $squawk->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $squawk->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-grat-500">No squawks yet. Be the first to squawk!</p>
        @endforelse
    </div>
</x-layout>

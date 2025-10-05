<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold underline mb-3">Latest Squawks!</h1>

        <form action="/squawk" method="post">
            @csrf
            <div>
                <textarea name="message" id="new-message" rows="4" maxlength="500" required placeholder="What's on your mind?" class="textarea textarea-bordered w-full resize-none @error('message') text-error @enderror" aria-description="Enter whats on your mind and submit it to publish your squawk">{{ old('message') }}</textarea>

                @error('message')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="mt-4 flex items-center justify-end">
                <button type="submit" class="btn btn-primary btn-sm" role="button" aria-description="Submit your squawk">Squawk!</button>
            </div>
        </form>

        @forelse($squawks as $squawk)
            <x-squawk :squawk="$squawk"></x-squawk>
        @empty
            <div class="hero py-12">
                <div class="hero-content text-center">
                    <div>
                        <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <p class="mt-4 text-base-content/60">No squawks yet. Be the first to squawk!</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</x-layout>

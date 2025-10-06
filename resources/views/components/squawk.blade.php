@props(['squawk'])

<div class="card bg-base-100 shadow my-2">
    <div class="card-body">
        <div class="flex space-x-3">
            @if($squawk->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($squawk->user->email) }}"
                             alt="{{ $squawk->user->name }}'s avatar"
                             aria-hidden="true"
                             class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                             alt="Anonymous User"
                             aria-hidden="true"
                             class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold" aria-label="squawkers name">{{ $squawk->user ? $squawk->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60" aria-hidden="true">·</span>
                        <span class="text-sm text-base-content/60" aria-label="squawked at">{{ $squawk->created_at->diffForHumans() }}</span>
                        @if ($squawk->updated_at->gt($squawk->created_at->addSeconds(5)))
                            <span class="text-base-content/60" aria-hidden="true">·</span>
                            <span class="text-sm text-base-content/60 italic" aria-label="Edited">Edited</span>
                        @endif
                    </div>

                    @auth
                        <div class="flex gap-1">
                            <a href="/squawks/{{ $squawk->id }}/edit" class="btn btn-ghost btn-xs" aria-description="Edit this squawk">Edit</a>
                            <form action="/squawks/{{ $squawk->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" role="button" onclick="return confirm('Are you sure you want to delete this squawk?')" class="btn btn-ghost btn-xs text-error" aria-description="Permanently deletes the current squawk">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>

                <p class="mt-1" aria-description="squawk message text">
                    {{ $squawk->message }}
                </p>
            </div>
        </div>
    </div>
</div>

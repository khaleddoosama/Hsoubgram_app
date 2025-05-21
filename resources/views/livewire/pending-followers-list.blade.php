<div wire:poll.2s class="max-h-64 overflow-y-auto w-full">
    <ul class="w-full divide-y divide-gray-200">
        @forelse(auth()->user()->pending_followers as $pending)
            <li class="flex items-center justify-between gap-2 p-3 w-full" wire:key="user-{{ $pending->id }}">
                {{-- Profile Image --}}
                <div class="flex items-center gap-3">
                    <img src="{{ $pending->image }}" class="w-10 h-10 rounded-full border border-neutral-300">
                    <div class="flex flex-col">
                        <span class="font-semibold text-sm truncate w-36">
                            <a href="user/{{ $pending->username }}">{{ $pending->username }}</a>
                        </span>
                        <span class="text-xs text-gray-500 truncate w-36">{{ $pending->name }}</span>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-1">
                    <button
                        class="bg-blue-500 text-white text-xs px-2 py-1 rounded"
                        wire:click="confirm({{ $pending->id }})">
                        {{ __('Confirm') }}
                    </button>
                    <button
                        class="border border-gray-400 text-xs px-2 py-1 rounded"
                        wire:click="delete({{ $pending->id }})">
                        {{ __('Delete') }}
                    </button>
                </div>
            </li>
        @empty
            <li class="p-3 text-center text-sm text-gray-500">
                {{ __('There are no pending requests.') }}
            </li>
        @endforelse
    </ul>
</div>

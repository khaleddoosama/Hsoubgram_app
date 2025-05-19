<div>
    @if ($isFollowing)
        <a wire:click="toggle_follow"
           class="w-30 cursor-pointer text-red-500 text-sm font-bold py-1 px-3 text-center rounded 
           {{ $showbg ? 'bg-red-400' : '' }} {{ $classes }}">
            {{ __('Unfollow') }}
        </a>
    @elseif($isPending)
        <span
            class="w-30 bg-gray-400 text-white text-sm font-bold py-1 px-3 text-center rounded">{{ __('Pending') }}</span>
    @else
        <a wire:click="toggle_follow"
             class="w-30 cursor-pointer text-blue-500 text-sm font-bold py-1 px-3 text-center rounded 
           {{ $showbg ? 'bg-blue-400' : '' }} {{ $classes }}">{{ __('Follow') }}</a>
    @endif
</div>

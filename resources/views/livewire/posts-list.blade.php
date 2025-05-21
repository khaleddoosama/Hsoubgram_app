 <div class="w-[30rem] mx-auto lg:w-[95rem]">
     @forelse ($this->posts as $post)
       <livewire:post :post="$post" wire:key="post-{{ $post->id }}" />
     @empty
         <div class="max-w-2xl mx-auto">
             {{ __('Start following your friends and enjoy') }}
         </div>
     @endforelse

 </div>

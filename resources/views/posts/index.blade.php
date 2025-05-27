<x-app-layout>


    <div class="flex flex-row max-w-3xl gap-20 mx-auto">


        {{-- Left Side --}}
       <livewire:postslist />

        {{-- Right Side --}}

        <div class="hidden w-[60rem] lg:flex lg:flex-col pt-4">

            <div role="alert" class="{{ session('status') ? '' : 'hidden' }} w-50 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded:lg  absolute right-10 shadow shadow-neutral-200">
                <span class="font-medium">{{ session('status') }}</span>
            </div>
            <div class="flex flex-row text-sm gap-2">
                <div class="mr-5">
                    <a href="{{ route('user.profile',Auth::user()->username) }}">
                        <img src="{{Str::startsWith(auth()->user()->image,'https') ? auth()->user()->image : asset('storage/'.auth()->user()->image)  }}" alt="{{ auth()->user()->username }}"
                            class="border border-gray-300 rounded-full h-12 w-12">
                    </a>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('user.profile',Auth::user()->username) }}" class="font-bold">{{ auth()->user()->username }}</a>
                    <div class="text-gray-500 text-sm">
                        {{ auth()->user()->name }}
                    </div>
                </div>

            </div>

            <div class="mt-5">
                <h3 class="text-gray-500 font-bold">
                    {{ __('Suggestion for you') }}
                </h3>

                <ul>
                    @foreach ($suggestedusers as $suggested)
                        <li class="flex items-center justify-between my-5 text-sm gap-2">

                            <div class="mr-5">
                                <a href="{{ route('user.profile',$suggested->username) }}">
                                    <img src="{{Str::startsWith($suggested->image,'https') ? $suggested->image : asset('storage/'.$suggested->image)  }}"
                                        class=" rounded-full h-9 w-9 border border-gray-300">
                                </a>
                            </div>
                            <div class="flex flex-col grow">
                                <a href="{{ route('user.profile',$suggested->username) }}" class="font-bold text-black">
                                    {{ $suggested->username }}
                                </a>
                                <div class="text-gray-500 text-sm">{{ $suggested->name }}</div>

                            </div>

                           <livewire:followbutton :userFriend="$suggested" classes="bg-gray" />
                        </li>
                    @endforeach

                </ul>

            </div>



           
        </div>

    </div>



</x-app-layout>

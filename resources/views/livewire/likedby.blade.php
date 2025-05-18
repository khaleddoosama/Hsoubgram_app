<div class="px-5 mb-4">
    
    @if($this->likes>0)
    <strong>
        <a href="{{ route('user.profile',$this->firstusername) }}">{{ $this->firstusername }}</a>
    </strong>
    @endif
    @if($this->likes>1)
    {{ __('and') }}
    <strong>{{ __('others') }}</strong>
    @endif
</div>

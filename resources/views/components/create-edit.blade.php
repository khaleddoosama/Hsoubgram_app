@if(isset($post)&& $post->image)

<div class="mb-4">
    <img src="{{ asset('storage/'.$post->image) }}" class="w-32 h-32 object-cover rounded-xl">
</div>

@endif
<input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl" name="image" id="file_input" type="file">
<p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG,JPG or GIF</p>

<textarea name="description" class="mt-10 w-full border border-gray-200 rounded-xl" rows="5" placeholder="{{ __('Write a description') }}">
    {{ old('description',$post->description ?? '') }}</textarea>
<div>
    {{-- Success is as dangerous as failure. --}}
    @if ($photo)
        @foreach ($photo as $file)
        <img src="{{$file->temporaryUrl()}}" />
        @endforeach
    @endif
    <input type="file" multiple wire:model="photo" />
</div>

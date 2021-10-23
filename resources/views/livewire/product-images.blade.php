<div>
    @if ($photo)
        Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}">
    @endif
    <input type="file" wire:model="photo" multiple>

    @error('photo') <span class="error">{{ $message }}</span> @enderror
</div>

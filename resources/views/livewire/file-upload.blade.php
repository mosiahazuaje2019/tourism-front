
<div>
    <form wire:submit.prevent="uploadFile">
        <input type="file" wire:model="file">
        <button type="submit">Upload</button>
    </form>

    @if ($file)
        <p>File uploaded: {{ $file->getClientOriginalName() }}</p>
    @endif
</div>

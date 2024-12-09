<div class="bg-white p-6 rounded-lg shadow-md">
    <form wire:submit.prevent="save">
        <label for="files">FILEPOND</label>
        <button class="bg-red-600 text-white px-2 rounded block" type="button">Reset</button>
        <x-filepond::upload wire:model="files" multiple />
        @error('files') <span class="error">{{ $message }}</span> @enderror
        <button class="bg-green-500 text-white px-2 rounded" type="submit">Télécharger</button>
    </form>
</div>

@push('scripts')
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script>
    // Configurer FilePond
    FilePond.create(document.getElementById('filepond'), {
    allowMultiple: true,
    server: {
        process: '/upload',  // Votre route d'upload
    }
    });

</script>
@endpush


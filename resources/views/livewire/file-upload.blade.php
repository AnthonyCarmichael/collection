<div class="bg-white p-6 rounded-lg shadow-md"
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <form wire:submit.prevent="save">
        @csrf    
        <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Choisir un album</label>
        <input type="file" name="files[]" multiple wire:model="files">

        <div class="mt-2">
            @foreach ($files as $file)
                <p>{{$file->getClientOriginalName()}}</p>
            @endforeach
        </div>
        <div class="mt-6">
            <label for="nomAlbum" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'album</label>
            <input type="text" name="nomAlbum" id="nomAlbum" wire:model="nomAlbum" class="rounded border-2 border-gray-200 mb-6 w-full">

            <label for="nomArtiste" class="block text-sm font-medium text-gray-700 mb-2">Nom de l'artiste</label>
            <input type="text" name="nomArtiste" id="nomArtiste" wire:model="nomArtiste" class="rounded border-2 border-gray-200 mb-6  w-full">

            <label for="coverAlbum" class="block text-sm font-medium text-gray-700 mb-2">Image de l'album</label>
            <input type="file" name="coverAlbum" id="coverAlbum" wire:model="cover">

            @if ($cover)
                <img src="{{ $cover->temporaryUrl() }}" alt="Image album" class="w-1/3 mt-2">
            @endif
        </div>

        <div class="w-full bg-gray-200 rounded-full h-2 my-4 "
            x-show="isUploading">
            <!-- Barre de progression -->
            <div class="bg-blue-500 h-2 rounded-full" x-bind:style="'width: ' + progress + '%'" role="progressbar"></div>
        </div>



        <button type="submit" class="block mt-4 bg-blue-500 text-white p-2 rounded-lg {{ $files ? null : 'hidden' }}"
            x-cloak>
            Uploader
        </button>
    </form>
</div>
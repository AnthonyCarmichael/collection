<div class="bg-white p-6 rounded-lg shadow-md"
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <form wire:submit.prevent="save">
        @csrf    
        <label for="nom" class="block text-sm font-medium text-gray-700">Choisir un album</label>
        <input type="file" name="files[]" multiple webkitdirectory wire:model="files">

        <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
            <!-- Barre de progression -->
            <div class="bg-blue-500 h-2 rounded-full" x-bind:style="'width: ' + progress + '%'" role="progressbar"></div>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-lg">
            Uploader
        </button>
    </form>
</div>
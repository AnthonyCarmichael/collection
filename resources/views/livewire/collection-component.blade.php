<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- upload section -->
    <section class="m-2">
        <button wire:click="openModalUpload" class="bg-blue-400 px-2 rounded text-white hover:bg-blue-600">upload +</button>
    </section>

    <!-- filter section -->
    <section class="flex m-2  p-2 bg-blue-400 text-white rounded">
        <div class="w-1/3">
            <label class="block text-center" for="artiste">Artiste:</label>
            <div class="flex justify-center">
                <input wire:input ="updateFilter" wire:model="filterArtiste" type="text" name="artiste" id="artiste" placeholder="Rechercher par artiste" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>

        <div class="w-1/3">
            <label class="block text-center" for="album">Album:</label>
            <div class="flex justify-center">
                <input wire:input ="updateFilter" wire:model="filterAlbum" type="text" name="album" id="album" placeholder="Rechercher par album" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>

        <div class="w-1/3">
            <label class="block text-center" for="annee">Année de parution:</label>
            <div class="flex justify-center">
                <input wire:input ="updateFilter" wire:model="filterAnnee" type="text" pattern="[0-9]"  onkeypress="return /[0-9]/i.test(event.key)" name="annee" id="annee" placeholder="Rechercher par année" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>
    </section>
    


    <!-- albums section -->
    <section>
        <div class="flex flex-wrap">
            @foreach ($albumArr as $album)
                <div class="w-1/3 p-2">
                    <div>
                        <img src="{{asset( 'storage/' . $album->imgPath)}}" alt="{{asset('storage/' . $album->imgPath)}}"
                            class="">
                        <p>{{ $album->nom }}</p>
                        <p>{{ $album->artiste->nom }}</p>
                        <p>{{ $album->annee }}</p>
                        <button class="text-blue-500 hover:text-blue-800">Télécharger</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>



    <!-- section modal -->
    <x-modal title="Ajouter un album" name="uploadModal" :show="false">
        <form action="{{ route('upload.folder') }}" method="POST" enctype="multipart/form-data">
            @csrf    
            <label for="nom" class="block text-sm font-medium text-gray-700">Choisir un album</label>
            <input type="file" name="files[]" multiple webkitdirectory wire:model="files">
            <button type="submit">Uploader</button>
            <div class="text-green-500" wire:loading.delay wire:target="files">
                Chargement ...
            </div>
        </form>
        <livewire:FileUpload/>
    </x-modal>

    
</div>
<div>
    <section class="flex m-2  p-2 bg-blue-400 text-white rounded">
        <div class="w-1/3">
            <label class="block text-center" for="artiste">Artiste:</label>
            <div class="flex justify-center">
                <input wire:model.live="filterArtiste" type="text" name="artiste" id="artiste" placeholder="Rechercher par artiste" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>

        <div class="w-1/3">
            <label class="block text-center" for="album">Album:</label>
            <div class="flex justify-center">
                <input type="text" name="album" id="album" placeholder="Rechercher par album" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>

        <div class="w-1/3">
            <label class="block text-center" for="annee">Année de parrution:</label>
            <div class="flex justify-center">
                <input type="text" name="annee" id="annee" placeholder="Rechercher par année" 
                    class="text-gray-700 rounded border-gray-300">
            </div>

        </div>
    </section>
    




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
</div>
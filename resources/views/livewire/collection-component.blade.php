<div>
    <div class="flex">

        <section class="bg-blue-100 p-2 mr-2 rounded w-1/4">
            <h2 class="text-center text-xl font-bold">Collections :</h2>
            <button class="text-sm m-auto w-40 hover:bg-blue-400 block bg-blue-500 text-white p-2 mt-2 rounded" wire:click="allCollection">Collection complète</button>
            
            @foreach ($collectionsArr as $collection )
                <button class="text-sm m-auto w-40 hover:bg-blue-400 block bg-blue-500 text-white p-2 mt-2 rounded" wire:click="selectedCollection({{$collection->id_collection}})">{{$collection->nom}}</button>
            @endforeach
            <button type="button" class="text-sm m-auto hover:bg-green-400 block bg-green-600 text-white p-2 mt-4 rounded" wire:click="openModalCreateCollection">Ajouter une collection</button>
        </section>
        <section class="bg-blue-100 p-2 rounded w-3/4">
            <h2 class="text-center text-xl font-bold">Collection</h2>
            <p class="text-center text-sm font-medium text-gray-700">{{isset($collectionSelected) ? $collectionSelected->nom : 'Collection complète'}}</p>


            @if (isset($elementAffiche))
                @foreach ($elementAffiche as $element)
                    <p>{{$element->nom}}</p>
                
                @endforeach
            @endif

        </section>
    </div>
    

    
    
    
    
    
    
    
    
    
    
    <!-- SECTION MODAL -->
    <x-modal title="Créer une collection" name="modalCreateCollection" :show="false">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form wire:submit.prevent="createCollection">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la collection</label>
                <input type="text" name="nom" id="nom" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required
                    wire:model="nom">
                <button type="submit" class="hover:bg-blue-400 block bg-blue-500 text-white p-2 mt-2 rounded">Confirmer</button>
            </form>
        </div>
    </x-modal>
</div>

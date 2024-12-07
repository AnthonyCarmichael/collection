<div>
    <h2 class="text-xl font-bold">Collections :</h2>
    
    @foreach ($collectionsArr as $collection )
        <button class="hover:bg-blue-400 block bg-blue-500 text-white p-2 rounded">{{$collection->nom}}</button>
    @endforeach

    <button type="button" class="hover:bg-green-400 block bg-green-600 text-white p-2 mt-4 rounded" wire:click="openModalCreateCollection">Créer une collection</button>
    
    <x-modal title="Créer une collection" name="modalCreateCollection" :show="false">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form wire:submit.prevent="createCollection">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la collection</label>
                <input type="text" name="nom" id="nom" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
                <button type="submit" class="hover:bg-blue-400 block bg-blue-500 text-white p-2 mt-2 rounded">Confirmer</button>
            </form>
        </div>
    </x-modal>
</div>

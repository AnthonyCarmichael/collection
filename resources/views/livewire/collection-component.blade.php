<div>

    <div class="flex">
        @foreach ($albumArr as $album )
            <div class="w-1/3">
                <p>{{$album->nom}}</p>
                <p></p>
            </div>
        @endforeach

    </div>




</div>

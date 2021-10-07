<div class="row">
    <div class="col-12">
        <ul>
            @foreach($record->attributesToArray() as $key => $value)
                <li><strong>{{$key}} : </strong> {{$value}} </li>
            @endforeach
        </ul>
    </div>
</div>

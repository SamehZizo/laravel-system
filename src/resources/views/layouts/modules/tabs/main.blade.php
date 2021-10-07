<div class="col-12 {{$class_name}}" style="height: 100%;display: none;">
    <ul>
        @foreach($record->attributesToArray() as $key => $value)
            <li><strong>{{$key}} : </strong> {{$value}} </li>
        @endforeach
    </ul>
</div>

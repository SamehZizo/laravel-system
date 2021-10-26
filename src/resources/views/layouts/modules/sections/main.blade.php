<div class="col-12 {{$class_name}}" style="height: 100%;display: none;">
    <div class="row">
        @foreach($record->attributesToArray() as $key => $value)
            <div class="col-md-4 col-xs-12">
                <div class="row">
                    <div class="col-md-5 col-xs-12 text-primary"><i class="fas fa-arrow-circle-right"></i> <strong>{{ucwords(str_replace('_', ' ', $key))}}</strong></div>
                    <div class="col-md-7 col-xs-12">{{$value}}</div>
                </div>
            </div>
        @endforeach
    </div>
    {{--<ul>
        @foreach($record->attributesToArray() as $key => $value)
            <li><strong>{{$key}} : </strong> {{$value}} </li>
        @endforeach
    </ul>--}}
</div>

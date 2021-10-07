<div class="col-12 {{$class_name}}" style="height: 100%;display: none;">
    <input type="hidden" id="route" value="{{route($record->getRouteName() . '.children_index', [$record->id, $child_name])}}">
    <div id="content" class="{{--text-white--}}">
    </div>
</div>

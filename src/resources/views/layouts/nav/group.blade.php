<div class="dropdown">
    <button class="btn m-0 pl-1 pr-1 pt-0 pb-0 {{--dropdown-toggle--}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="@if(isset($icon)){{$icon}}@endif fa-lg @if(isset($color)){{$color}}@else text-primary @endif"></i><br>{{$title}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($items as $item)
            @php $item_array = [] @endphp
            @if(isset($item['title'])) @php $item_array['title'] = $item['title'] @endphp @endif
            @if(isset($item['icon'])) @php $item_array['icon'] = $item['icon'] @endphp @endif
            @if(isset($item['color'])) @php $item_array['color'] = $item['color'] @endphp @endif
            @if(isset($item['route'])) @php $item_array['route'] = $item['route'] @endphp @endif
            {{--@include('laravel-system::layouts.nav.group_item', [, 'icon'=>$item['icon'], 'color'=>$item['color'], 'route'=>$item['route']])--}}
            @include('laravel-system::layouts.nav.group_item', $item_array)
        @endforeach
    </div>
</div>

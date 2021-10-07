<div class="dropdown">
    <button class="btn m-0 pl-1 pr-1 pt-0 pb-0 {{--dropdown-toggle--}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="@if(isset($icon)){{$icon}}@endif fa-lg @if(isset($color)){{$color}}@else text-primary @endif"></i><br>{{$title}}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($items as $item)
            @include('layouts.nav.group_item', ['title'=>$item['title'], 'icon'=>$item['icon'], 'color'=>$item['color'], 'route'=>$item['route']])
        @endforeach
    </div>
</div>

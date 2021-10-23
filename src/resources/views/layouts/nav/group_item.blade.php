<li>
    <a @if(isset($route))href="{{route($route)}}"@endif>
        <button class="btn ml-2 mr-2 mt-0 mb-0 pl-1 pr-1 pt-0 pb-0" type="button">
            <i class="@if(isset($icon)){{$icon}}@endif fa @if(isset($color)){{$color}}@else text-primary @endif mr-3"></i>
            <span>{{$title}}</span>
        </button>
    </a>
</li>

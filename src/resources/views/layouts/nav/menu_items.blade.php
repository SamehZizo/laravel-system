@include('layouts.nav.item',['title' => 'Home', 'icon' => 'fas fa-home', 'color' => 'text-dark'])
@include('layouts.nav.item',['title' => 'Clients', 'icon' => 'fas fa-user', 'route' => 'clients.index'])
@include('layouts.nav.item',['title' => 'Periods', 'icon' => 'fas fa-calendar-week','color' => 'text-success', 'route' => 'periods.index'])
{{--@include('layouts.nav.item',['title' => 'Settings', 'icon' => 'fas fa-cog','color' => 'text-dark', 'route' => 'settings.index'])--}}
@include('layouts.nav.group',[
    'title' => 'Settings','icon' => 'fas fa-cog','color' => 'text-dark',
    'items'=> [
        ['title' => 'Settings', 'icon' => 'fas fa-cog', 'color' => 'text-dark', 'route' => 'settings.index'],
        ['title' => 'Terms And Conditions', 'icon' => 'fas fa-cog', 'color' => 'text-dark', 'route' => 'terms_conditions.index'],
    ],
])
@include('layouts.nav.group',[
    'title' => 'System','icon' => 'fas fa-file-alt','color' => 'text-danger',
    'items'=> [
        ['title' => 'System Field', 'icon' => 'fas fa-file-alt', 'color' => 'text-danger', 'route' => 'system_fields.index'],
        ['title' => 'System Forms', 'icon' => 'fas fa-file-alt', 'color' => 'text-danger', 'route' => 'system_forms.index'],
    ],
])

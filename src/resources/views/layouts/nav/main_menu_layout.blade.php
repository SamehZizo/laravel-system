@include(config('laravel_system.menu_layout'))
@include('laravel-system::layouts.nav.group',[
    'title' => 'System','icon' => 'fas fa-file-alt','color' => 'text-danger',
    'items'=> [
        ['title' => 'System Field', 'icon' => 'fas fa-file-alt', 'color' => 'text-danger', 'route' => 'system_fields.index'],
        ['title' => 'System Forms', 'icon' => 'fas fa-file-alt', 'color' => 'text-danger', 'route' => 'system_forms.index'],
    ],
])

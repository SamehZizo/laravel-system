<?php


namespace Sameh\LaravelSystem\Routing;

use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;

class CustomRouting extends ResourceRegistrar
{
    protected $extraResourceDefaults = ['datatable', 'children_index', 'child_datatable', 'child_store', 'child_show'];

    public function __construct(Router $router)
    {
        parent::__construct($router);
        $this->resourceDefaults = array_merge($this->resourceDefaults, $this->extraResourceDefaults);
    }

    protected function addResourceDatatable($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/datatable/get';

        unset($options['missing']);

        $action = $this->getResourceAction($name, $controller, 'datatable', $options);

        return $this->router->get($uri, $action);
    }

    protected function addResourceChildren_index($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/{' . $base . '}/child_index/{child_name}';

        $action = $this->getResourceAction($name, $controller, 'children_index', $options);

        return $this->router->get($uri, $action);
    }

    protected function addResourceChild_datatable($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/datatable/get_child/{' . $base . '}';

        $action = $this->getResourceAction($name, $controller, 'child_datatable', $options);

        return $this->router->get($uri, $action);
    }

    protected function addResourceChild_store($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/child_store/{parent_id}';

        $action = $this->getResourceAction($name, $controller, 'child_store', $options);

        return $this->router->post($uri, $action);
    }

    protected function addResourceChild_show($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name) . '/child_show/{'.$base.'}';

        $action = $this->getResourceAction($name, $controller, 'child_show', $options);

        return $this->router->get($uri, $action);
    }

}

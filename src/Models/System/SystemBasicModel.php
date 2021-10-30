<?php

namespace Sameh\LaravelSystem\Models\System;

use Illuminate\Database\Eloquent\Model;

class SystemBasicModel extends Model
{
    private $singular_name, $plural_name, $title_name;
    private $route_name;
    private $title_column;
    protected $extra_appends = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setSingularName('');
        $this->setPluralName('');
        $this->setTitleName('');
        $this->setRouteName('');
        $this->setTitleColumn('');
        $this->appends = array_merge($this->appends, $this->extra_appends);
    }

    /**
     * @return mixed
     */
    public function getSingularName()
    {
        return $this->singular_name;
    }

    /**
     * @param mixed $singular_name
     */
    public function setSingularName($singular_name): void
    {
        $this->singular_name = $singular_name;
    }

    /**
     * @return mixed
     */
    public function getPluralName()
    {
        return $this->plural_name;
    }

    /**
     * @param mixed $plural_name
     */
    public function setPluralName($plural_name): void
    {
        $this->plural_name = $plural_name;
    }

    /**
     * @return mixed
     */
    public function getTitleName()
    {
        return $this->title_name;
    }

    /**
     * @param mixed $title_name
     */
    public function setTitleName($title_name): void
    {
        $this->title_name = $title_name;
    }

    /**
     * @return mixed
     */
    public function getRouteName()
    {
        return $this->route_name;
    }

    /**
     * @param mixed $route_name
     */
    public function setRouteName($route_name): void
    {
        $this->route_name = $route_name;
    }

    /**
     * @return mixed
     */
    public function getTitleColumn()
    {
        return $this->title_column;
    }

    /**
     * @param mixed $title_column
     */
    public function setTitleColumn($title_column): void
    {
        !empty($title_column) ? $this->title_column = $title_column : $this->title_column = 'title';
    }

}

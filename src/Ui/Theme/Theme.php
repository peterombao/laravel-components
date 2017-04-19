<?php namespace Peterombao\LaravelComponents\Ui\Theme;


class Theme {

    protected $admin = false;

    protected $current = false;

    protected $path = null;

    public function isCurrent(){
        return $this->current;
    }

    public function setCurrent($current){
        $this->current = $current;

        return $this;
    }

    public function isAdmin(){
        return $this->admin;
    }

    public function getPath($path = null){
        return __DIR__ . '/../../../' . $path;
        //return base_path($path);
    }

} 
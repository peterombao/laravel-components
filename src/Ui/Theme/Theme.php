<?php namespace Peterombao\LaravelComponents\Ui\Theme;


class Theme {

    protected $admin = false;

    protected $current = false;

    public function isCurrent(){
        return $this->current;
    }

    public function setCurrent($current){
        $this->current = $current;

        return $this;
    }

} 
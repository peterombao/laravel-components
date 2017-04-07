<?php namespace Peterombao\LaravelComponents\Ui\Table;


class TableBuilder {

    protected $view;

    public function setView($view){
        $this->view = $view;

        return $this;
    }

    public function getView(){
        return $this->view;
    }

    public function build(){
        return view('table::table');
    }

} 
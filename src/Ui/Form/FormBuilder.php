<?php namespace Peterombao\LaravelComponents\Ui\Form;


class FormBuilder {

    protected $sections;

    protected $fields = [];

    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getSections()
    {
        return $this->sections;
    }

    public function setSections($sections)
    {
        $this->sections = $sections;

        return $this;
    }

    public function build(){
        return view('form::form');
    }

} 
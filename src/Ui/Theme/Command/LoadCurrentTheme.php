<?php namespace Peterombao\LaravelComponents\Ui\Theme\Command;


use Illuminate\Contracts\View\Factory;
use Peterombao\LaravelComponents\Ui\Theme\Theme;

class LoadCurrentTheme {

    public function handle(
        Theme $theme,
        Factory $view
    ){
        $public = app('Peterombao\PublicTheme\PublicTheme');

        $view->addNamespace('theme', $public->getPath('resources/views'));

        //echo $public->getPath('resources/views');
    }

} 
<?php namespace Peterombao\LaravelComponents\Ui\Theme\Command;


use Peterombao\LaravelComponents\Ui\Theme\Theme;

class LoadCurrentTheme {

    public function handle(Theme $theme){
        $public = app('Peterombao\PublicTheme\PublicTheme');
        echo 'asdf';
    }

} 
<?php namespace Peterombao\LaravelComponents\Addon\Console\Command;


use Illuminate\Filesystem\Filesystem;

class WriteAddonLang
{
    private $path;

    private $type;

    private $slug;

    public function __construct($path, $type, $slug)
    {
        $this->path = $path;
        $this->type = $type;
        $this->slug = $slug;
    }

    public function handle(Filesystem $filesystem)
    {
        $path = "{$this->path}/resources/lang/en/addon.php";

        $title = ucwords(str_replace('_', ' ', $this->slug));
        $type = ucwords(str_replace('_', ' ', $this->type));

        $template = $filesystem->get(
            base_path('vendor/peterombao/laravel-components/resources/stubs/addons/resources/lang/en/addon.stub')
        );

        $filesystem->makeDirectory(dirname($path), 0755, true, true);

        $template = str_replace('{title}', $title, $template);
        $template = str_replace('{type}', $type, $template);

        $filesystem->put($path, $template);
    }
} 
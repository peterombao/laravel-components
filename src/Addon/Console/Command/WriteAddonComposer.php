<?php namespace Peterombao\LaravelComponents\Addon\Console\Command;


use Illuminate\Filesystem\Filesystem;

class WriteAddonComposer
{
    private $path;

    private $type;

    private $slug;

    private $vendor;

    public function __construct($path, $type, $slug, $vendor)
    {
        $this->path = $path;
        $this->type = $type;
        $this->slug = $slug;
        $this->vendor = $vendor;
    }

    public function handle(Filesystem $filesystem)
    {
        $path = "{$this->path}/composer.json";

        $slug = $this->slug;
        $type = $this->type;
        $vendor = $this->vendor;

        $prefix = ucfirst(camel_case($vendor)) . '\\\\' . ucfirst(camel_case($slug)) . ucfirst(camel_case($type)) . '\\\\';

        $template = $filesystem->get(
            base_path('vendor/peterombao/laravel-components/resources/stubs/addons/composer.stub')
        );

        $filesystem->makeDirectory(dirname($path), 0755, true, true);

        $template = str_replace('{vendor}', $vendor, $template);
        $template = str_replace('{slug}', $slug, $template);
        $template = str_replace('{type}', $type, $template);
        $template = str_replace('{prefix}', $prefix, $template);

        $filesystem->put($path, $template);
    }
} 
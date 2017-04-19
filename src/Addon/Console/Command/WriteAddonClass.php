<?php namespace Peterombao\LaravelComponents\Addon\Console\Command;


use Illuminate\Filesystem\Filesystem;

class WriteAddonClass
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
        $slug = ucfirst(camel_case($this->slug));
        $type = ucfirst(camel_case($this->type));
        $vendor = ucfirst(camel_case($this->vendor));

        $addon = $slug . $type;
        $namespace = "{$vendor}\\{$addon}";

        $path = "{$this->path}/src/{$addon}.php";

        $template = $filesystem->get(
            base_path("vendor/peterombao/laravel-components/resources/stubs/addons/{$this->type}.stub")
        );

        $filesystem->makeDirectory(dirname($path), 0755, true, true);

        $template = str_replace('{namespace}', $namespace, $template);
        $template = str_replace('{addon}', $addon, $template);

        $filesystem->put($path, $template);
    }
} 
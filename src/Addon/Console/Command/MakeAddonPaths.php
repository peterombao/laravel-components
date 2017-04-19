<?php namespace Peterombao\LaravelComponents\Addon\Console\Command;


use Illuminate\Filesystem\Filesystem;

class MakeAddonPaths
{
    private $vendor;

    private $type;

    private $slug;

    public function __construct($vendor, $type, $slug)
    {
        $this->vendor = $vendor;
        $this->type = $type;
        $this->slug = $slug;
    }

    public function handle(Filesystem $filesystem)
    {
        $path = base_path("addons/{$this->vendor}/{$this->slug}-{$this->type}");
        $config = "{$path}/resources/config";
        $views = "{$path}/resources/views";

        $filesystem->makeDirectory($path, 0755, true, true);
        $filesystem->makeDirectory($views, 0755, true, true);
        $filesystem->makeDirectory($config, 0755, true, true);

        return $path;
    }
} 
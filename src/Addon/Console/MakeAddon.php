<?php namespace Peterombao\LaravelComponents\Addon\Console;


use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Peterombao\LaravelComponents\Addon\Console\Command\MakeAddonPaths;
use Symfony\Component\Console\Input\InputArgument;

class MakeAddon extends Command
{
    use DispatchesJobs;

    protected $name = 'make:addon';

    protected $description = 'Create a new addon.';

    public function handle()
    {
        $namespace = $this->argument('namespace');

        if (!str_is('*.*.*', $namespace)) {
            throw new \Exception("The namespace should be snake case and formatted like: {vendor}.{type}.{slug}");
        }

        list($vendor, $type, $slug) = array_map(
            function ($value) {
                return str_slug(strtolower($value), '_');
            },
            explode('.', $namespace)
        );

        $path = $this->dispatch(new MakeAddonPaths($vendor, $type, $slug));
    }

    protected function getArguments()
    {
        return [
            ['namespace', InputArgument::REQUIRED, 'The addon\'s desired dot namespace.']
        ];
    }
} 
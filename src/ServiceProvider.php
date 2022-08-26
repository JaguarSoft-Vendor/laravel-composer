<?php 
namespace JaguarSoft\LaravelComposer;

use JaguarSoft\LaravelComposer\Console\ComposerUpdateCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function register()
    {
        
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/vendor-update-gitignore.txt' => base_path('vendor-update/.gitignore'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ComposerUpdateCommand::class,
            ]);
        }
    }

}

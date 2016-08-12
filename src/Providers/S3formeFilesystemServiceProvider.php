<?php

namespace Lemesdaniel\S3forme\Providers;

use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3v2\AwsS3Adapter;


class S3formeFilesystemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->publishes([__DIR__ . '/../resources/config/s3forme.php' => config_path('s3forme.php')]);
        

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Storage::extend('s3forme', function($app, $config)
        {
            
            $client = S3Client::factory(array(
                'key'    => $config['key'],
                'secret' => $config['secret'],
                'ACL' => $config['visibility'],
                'endpoint'  => $config['endpoint'],
            ));

            return new Filesystem(new AwsS3Adapter($client, $config['bucket']));

        });
    }
}

s3forme-laravel
-------------

Requirements
------------

* laravel >= 5.1
* league/flysystem-aws-s3-v2 >=1.0 (retrieved automatically via Composer)

Installation
------------

Using Composer:

```sh
composer require lemesdaniel/s3forme-laravel
```


Usage
------------

In your config/flysystem.php file set the default driver to 's3forme' and add the connection configuration like so:

```php
'default' => 's3forme',

'cloud' => 's3forme',

'disks' => [
    ...
    's3forme' => [
        'key' => 'you-key',
        'secret' => 'you-secret-key',
        'visibility' => 'public-read', // or private
        'bucket' => 'image', //name your bucket
        'endpoint'  => 'http://rest.s3for.me',
    ],
    ...
]
```

In your config/app.php file add the following provider to your service providers array:

```php
'providers' => [
    ...
    Lemesdaniel\S3forme\Providers\S3formeFilesystemServiceProvider::class,
    ...
]
```

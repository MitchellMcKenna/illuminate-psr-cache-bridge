<?php

namespace Madewithlove\IlluminatePsrCacheBridge\Providers;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\ServiceProvider;
use Madewithlove\IlluminatePsrCacheBridge\Laravel\CacheItemPool;
use Psr\Cache\CacheItemPoolInterface;

class IlluminatePsrCacheServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CacheItemPoolInterface::class, function () {
            $repository = $this->app->make(Repository::class);
            return new CacheItemPool($repository);
        });
    }
}

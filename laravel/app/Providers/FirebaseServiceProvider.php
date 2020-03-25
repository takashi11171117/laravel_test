<?php

namespace App\Providers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(\Kreait\Firebase::class, function () {
            // 'path/to/firebase-private-key' の部分は書き換えてください
            $serviceAccount = ServiceAccount::fromJsonFile(base_path() . '/laravel-auth-firebase-adminsdk.json');
            return (new Factory())
                ->withServiceAccount($serviceAccount)
                ->create();
        });
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        return [\Kreait\Firebase::class];
    }
}

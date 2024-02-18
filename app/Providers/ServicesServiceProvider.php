<?php

namespace App\Providers;

use App\Services\Interfaces\UserBalanceInterface;
use App\Services\Interfaces\UserInterface;
use App\Services\Interfaces\UserOperationInterface;
use App\Services\UserBalanceService;
use App\Services\UserOperationService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserInterface::class,
            UserService::class
        );
        $this->app->bind(
            UserBalanceInterface::class,
            UserBalanceService::class
        );
        $this->app->bind(
            UserOperationInterface::class,
            UserOperationService::class
        );
    }
}

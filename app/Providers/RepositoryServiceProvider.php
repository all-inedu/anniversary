<?php

namespace App\Providers;

use App\Interfaces\ChallengeRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\DestinationRepositoryInterface;
use App\Interfaces\LeadSourceRepositoryInterface;
use App\Interfaces\MajorRepositoryInterface;
use App\Interfaces\SchoolRepositoryInterface;
use App\Interfaces\UniversityRepositoryInterface;
use App\Repositories\ChallengeRepository;
use App\Repositories\ClientRepository;
use App\Repositories\DestinationRepository;
use App\Repositories\LeadSourceRepository;
use App\Repositories\MajorRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\UniversityRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(LeadSourceRepositoryInterface::class, LeadSourceRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);
        $this->app->bind(ChallengeRepositoryInterface::class, ChallengeRepository::class);

        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
        $this->app->bind(DestinationRepositoryInterface::class, DestinationRepository::class);
        $this->app->bind(MajorRepositoryInterface::class, MajorRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\TypeHandicap' => 'App\Policies\TypeHandicapPolicy',
        'App\Models\Service' => 'App\Policies\ServicePolicy',
        'App\Models\CouvertureMedical' => 'App\Policies\CouvertureMedicalPolicy',
        'App\Models\Employe' => 'App\Policies\EmployePolicy',
        'App\Models\NiveauScolaire' => 'App\Policies\NiveauScolairePolicy',

        

        

        


    ];

    /**
     * Register any authentication / authorization services.
     */
  

    public function boot()
    {
       // 
    }
}

<?php

namespace App\Providers;

use App\Models\Contatto;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // GATE PER ACCESSO AMMINISTRATORE
        Gate::define("amministratore", function (Contatto $contatto){
            return $contatto->idContattoRuolo === 1;
        });
        
        // GATE PER ACCESSO AMMINISTRATORE E UTENTE
        Gate::define("visualizzare", function (Contatto $contatto){
            return in_array($contatto->idContattoRuolo, [1, 2]);
        });

        // GATE PER ACCESSO AMMINISTRATORE, UTENTE E OSPITE
        Gate::define("visualizzare2", function (Contatto $contatto){
            return in_array($contatto->idContattoRuolo, [1,2,3]);
        });
    }
}













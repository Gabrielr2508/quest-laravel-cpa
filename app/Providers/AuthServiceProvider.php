<?php

namespace estoque\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use estoque\Models\Professor;
use estoque\Models\Colegiado;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'estoque\Model' => 'estoque\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        Gate::define('is_aluno', function ($user) {
          return $user->aluno_professor == '0';
        });

        Gate::define('is_professor', function ($user) {
          return $user->aluno_professor == '1';
        });

        Gate::define('is_admin', function ($user) {
          return $user->aluno_professor == '2';
        });

        Gate::define('is_coordenador', function ($user) {
           $professor =  Professor::where('cpf', $user->cpf)->value('id');
           if(!is_null($professor)){
                return !is_null(Colegiado::where('coordenador_id', $professor)->first());
            }
            return false;
        });


    }
}

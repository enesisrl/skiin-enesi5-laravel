<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Master\Modules\AppUsers\Components\AppUser;
use Master\Modules\AppUsers\Components\Privacy;
use Master\Modules\AppUsers\Components\Smartphone;

class MasterServiceProvider extends \Enesisrl\LaravelMasterCore\Providers\MasterServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {

        // Registro classi Master
        parent::register();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        parent::boot();
        Blade::component('app-user', AppUser::class);
        Blade::component('smartphone', Smartphone::class);
        Blade::component('privacy', Privacy::class);
    }

    protected function registerWebsitesRoutes(): void
    {
        /*
        Registro le route di tutti i domini attivi
        Eseguo solo se le route non sono salvate in cache e se non è in esecuzione una migrate
        Utilizzando quinzi "artisan optimize" le route non vengono caricate perchè sono salvate in cache
        */
        if($this->app->routesAreCached() || (isset($_SERVER['argv'][1]) && str_contains($_SERVER['argv'][1], 'migrate'))){
            return;
        }

        $model = $this->app->WebsitesModule->getModel();
        $websites = $model->select('websites.id', 'websites.domains', 'themes.folder')->join('themes', 'themes.id', 'websites.theme_id')->where('published', 1)->get();
        foreach($websites as $website){
            $basePath = $website->folder ? base_path("front/{$website->folder}") : null;
            $domains = json_decode($website->domains);
            if(!$basePath || !$domains){
                continue;
            }
            foreach($domains as $domain) {
                $this->app->Front->groupRoutes(['domain' => $domain->value, 'middleware' => 'web'], "{$basePath}/Routes/web.php");
                $this->app->Front->groupRoutes(['domain' => $domain->value, 'middleware' => 'api'], "{$basePath}/Routes/api.php");
            }
        }

    }

}

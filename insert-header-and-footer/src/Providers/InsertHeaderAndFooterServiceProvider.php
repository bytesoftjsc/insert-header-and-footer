<?php

namespace Botble\InsertHeaderAndFooter\Providers;

use Illuminate\Support\ServiceProvider;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class InsertHeaderAndFooterServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/insert-header-and-footer')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        $this->app->register(HookServiceProvider::class);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-insert-header-and-footer',
                'priority' => 9,
                'parent_id' => 'cms-core-settings',
                'name' => 'plugins/insert-header-and-footer::insert-header-and-footer.name',
                'url' => route('insert-header-and-footer.index'),
                'permissions' => ['insert-header-and-footer.index'],
            ]);
        });
    }
}

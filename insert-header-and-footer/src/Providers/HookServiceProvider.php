<?php

namespace Botble\InsertHeaderAndFooter\Providers;

use Illuminate\Support\ServiceProvider;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        add_filter(THEME_FRONT_HEADER, [$this, 'add_header'], 56, 2);
        add_filter(THEME_FRONT_FOOTER, [$this, 'add_footer'], 56, 2);
    }

    public function add_header()
    {
        return setting('insert_to_header') ?? null;
    }

    public function add_footer()
    {
        return setting('insert_to_footer') ?? null;
    }
}

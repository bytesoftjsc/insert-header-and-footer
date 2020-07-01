<?php

namespace Botble\InsertHeaderAndFooter;

use Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('insert_header_and_footers');
    }
}

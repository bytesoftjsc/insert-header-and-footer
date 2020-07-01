<?php

Route::group(['namespace' => 'Botble\InsertHeaderAndFooter\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'insert-header-and-footers', 'as' => 'insert-header-and-footer.'], function () {
            Route::get('', [
                'as' => 'index',
                'uses' => 'InsertHeaderAndFooterController@index',
                'permission' => 'insert-header-and-footer.index',
            ]);
            Route::post('', [
                'as' => 'edit',
                'uses' => 'InsertHeaderAndFooterController@postEdit',
                'permission' => 'insert-header-and-footer.edit',
            ]);
        });
    });

});

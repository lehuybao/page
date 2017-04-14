<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('page', [
    'as' => 'page',
    'uses' => 'Foostart\Page\Controllers\Front\PageFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/page', [
            'as' => 'admin_page',
            'uses' => 'Foostart\Page\Controllers\Admin\PageAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/page/edit', [
            'as' => 'admin_page.edit',
            'uses' => 'Foostart\Page\Controllers\Admin\PageAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/page/edit', [
            'as' => 'admin_page.post',
            'uses' => 'Foostart\Page\Controllers\Admin\PageAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/page/delete', [
            'as' => 'admin_page.delete',
            'uses' => 'Foostart\Page\Controllers\Admin\PageAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/page_category', [
            'as' => 'admin_page_category',
            'uses' => 'Foostart\Page\Controllers\Admin\PageCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/page_category/edit', [
            'as' => 'admin_page_category.edit',
            'uses' => 'Foostart\Page\Controllers\Admin\PageCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/page_category/edit', [
            'as' => 'admin_page_category.post',
            'uses' => 'Foostart\Page\Controllers\Admin\PageCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/page_category/delete', [
            'as' => 'admin_page_category.delete',
            'uses' => 'Foostart\Page\Controllers\Admin\PageCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

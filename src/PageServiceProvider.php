<?php

namespace Foostart\Page;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class PageServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/page_admin.php' => config_path('page_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'page');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'page');


        /**
         * Load view composer
         */
        $this->pageViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Page\Controllers\Admin\PageAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'page');
    }

    /**
     *
     */
    public function pageViewComposer(Request $request) {

        view()->composer('page::page*', function ($view) {
            global $request;
            $page_id = $request->get('id');
            $is_action = empty($page_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Pages
                 */
                //list
                trans('page::page.page_list') => [
                    'url' => URL::route('admin_page'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('page::page.'.$is_action) => [
                    'url' => URL::route('admin_page.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('page::page.page_category_list') => [
                    'url' => URL::route('admin_page_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}

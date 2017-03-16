<?php
namespace Webmachine\Settings;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider {
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {        
        if (! class_exists('CreateSettingsTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/database/migrations/create_settings_table.php.stub' => database_path("migrations/{$timestamp}_create_settings_table.php"),
            ], 'migrations');
        }        
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
        return \App::bind('settings', function(){
            return new Settings();
        });
    }
}
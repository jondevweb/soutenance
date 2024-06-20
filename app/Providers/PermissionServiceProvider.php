<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Registering any application services
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPermissions();
    }

    /**
     * Register the permissions and roles.
     */
    protected function registerPermissions()
    {
        // Check if the app is running in console to prevent issues during migrations
        if ($this->app->runningInConsole()) {
            return;
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions
        Permission::firstOrCreate(['name' => 'view posts']);
        Permission::firstOrCreate(['name' => 'edit posts']);
        Permission::firstOrCreate(['name' => 'delete posts']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['view posts', 'edit posts', 'delete posts']);
        $userRole->givePermissionTo('view posts');
    }
}

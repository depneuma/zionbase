<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        // Create user role and assign existing permissions
        $userRole = Role::create(['name' => 'user']);

        // Create default permissions
        Permission::create(['name' => 'list blogs']);
        Permission::create(['name' => 'view blogs']);
        Permission::create(['name' => 'create blogs']);
        Permission::create(['name' => 'update blogs']);
        Permission::create(['name' => 'delete blogs']);

        Permission::create(['name' => 'list events']);
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'update events']);
        Permission::create(['name' => 'delete events']);
        Permission::create(['name' => 'notify events']);

        Permission::create(['name' => 'list sermons']);
        Permission::create(['name' => 'view sermons']);
        Permission::create(['name' => 'create sermons']);
        Permission::create(['name' => 'update sermons']);
        Permission::create(['name' => 'delete sermons']);

        Permission::create(['name' => 'list subscriptions']);
        Permission::create(['name' => 'view subscriptions']);
        Permission::create(['name' => 'create subscriptions']);
        Permission::create(['name' => 'update subscriptions']);
        Permission::create(['name' => 'delete subscriptions']);

        Permission::create(['name' => 'list heros']);
        Permission::create(['name' => 'view heros']);
        Permission::create(['name' => 'create heros']);
        Permission::create(['name' => 'update heros']);
        Permission::create(['name' => 'delete heros']);

        // Create admin role and assign existing permissions
        $currentPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions

        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($superAdminRole);
        }
    }
}

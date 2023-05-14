<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users_manage']);
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

        // $this->call(PermissionSeed::class);
       // $this->call(RoleSeed::class);
        //$/this->call(UserSeed::class);
}
}

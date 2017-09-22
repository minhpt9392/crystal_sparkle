<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(RoleUserTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(PermissionRoleTableSeeder::class);
         $this->call(ConfigurationsTableSeeder::class);
         $this->call(NationalitiesTableSeeder::class);
         $this->call(DurationsTableSeeder::class);
         $this->call(ShopsTableSeeder::class);
         $this->call(PackageTypesTableSeeder::class);
         $this->call(DescriptionsTableSeeder::class);
    }
}

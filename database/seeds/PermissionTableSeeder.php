<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = DB::table('permissions')->where('name', 'manage-users')->first();
        if (!$permission) {
            DB::table('permissions')->insert([
                'uuid' => 'f09e8d05-312b-4ba9-8fff-5452ceb0d119',
                'name' => 'manage-users',
                'display_name' => 'Manage User',
                'description' => 'Create, Update and Delete User Account',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }
        $permission = DB::table('permissions')->where('name', 'manage-roles')->first();
        if (!$permission) {
            DB::table('permissions')->insert([
                'uuid' => '9e1ced4f-07ec-4c68-8b3a-149d55df5bd2',
                'name' => 'manage-roles',
                'display_name' => 'Manage Roles',
                'description' => 'Create, Update and Delete User Role',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }
        $permission = DB::table('permissions')->where('name', 'manage-controls')->first();
        if (!$permission) {
            DB::table('permissions')->insert([
                'uuid' => '83378eeb-f4f9-48bb-a4fd-5c2d4c110347',
                'name' => 'manage-controls',
                'display_name' => 'Manage Controls',
                'description' => 'Create, Update and Delete User Permission',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = DB::table('permission_role')->where('permission_id', 1)->where('role_id', 1)->first();
        if (!$permission) {
            DB::table('permission_role')->insert([
                'permission_id' => 1,
                'role_id' => 1
            ]);
        }
        $permission = DB::table('permission_role')->where('permission_id', 2)->where('role_id', 1)->first();
        if (!$permission) {
            DB::table('permission_role')->insert([
                'permission_id' => 2,
                'role_id' => 1
            ]);
        }
        $permission = DB::table('permission_role')->where('permission_id', 3)->where('role_id', 1)->first();
        if (!$permission) {
            DB::table('permission_role')->insert([
                'permission_id' => 3,
                'role_id' => 1
            ]);
        }
    }
}

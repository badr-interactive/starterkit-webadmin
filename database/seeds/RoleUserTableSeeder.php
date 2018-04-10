<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = DB::table('role_user')->where('user_id', 1)->where('role_id', 1)->first();
        if (!$roleUser) {
            DB::table('role_user')->insert([
                [
                    'user_id' => 1,
                    'role_id' => 1
                ]
            ]);
        }
    }
}

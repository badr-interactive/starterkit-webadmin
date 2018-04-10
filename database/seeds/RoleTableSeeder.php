<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = DB::table('roles')->where('name', 'admin')->first();
        if(!$roles) {
            DB::table('roles')->insert([
                'uuid' => 'a0922a55-bfd3-4ff9-9398-06e043af2300',
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }

        $roles = DB::table('roles')->where('name', 'manager')->first();
        if(!$roles) {
            DB::table('roles')->insert([
                'uuid' => '7a0c7fc2-d6ee-4144-80fd-737c1c27e095',
                'name' => 'manager',
                'display_name' => 'Manager',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }

        $roles = DB::table('roles')->where('name', 'staff')->first();
        if(!$roles) {
            DB::table('roles')->insert([
                'uuid' => 'a6952548-f9cf-4ed1-938c-ca0b5816dc43',
                'name' => 'staff',
                'display_name' => 'Staff',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
        }
    }
}

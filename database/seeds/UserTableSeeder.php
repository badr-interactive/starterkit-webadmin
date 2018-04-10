<?php

use Illuminate\Database\Seeder;
use Identicon\Identicon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'admin@example.com')->first();
        if (!$user) {
            DB::table('users')->insert([
                'uuid' => 'bf75fdbb-0bb3-47eb-a48e-c77c2e069de6',
                'email' => 'admin@example.com',
                'name' => 'Administrator',
                'phone' => '0123-4567xxx',
                'password' => bcrypt('password123'),
                'last_login' => '2016-02-01 10:00:00',
                'created_at' => '2016-02-01 10:00:00',
                'updated_at' => '2016-02-01 10:00:00'
            ]);
    
            $identicon = new Identicon();
            $image = $identicon->getImageData('Administrator');
            Storage::put('avatars/bf75fdbb-0bb3-47eb-a48e-c77c2e069de6.png', $image);
        }
    }
}

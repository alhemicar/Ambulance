<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super.admin@gmail.com',
            'username' => 'admin',
            'user_role_id' => 1,
            'password' => bcrypt('Admin123'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}

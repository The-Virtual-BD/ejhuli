<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'username' => 'superadmin',
                'password' => bcrypt('123456789'),
                'user_type' => 1,
                'status' => 1,
            ],
        ]);
        DB::table('admins')->insert([
            [
                'user_id' => 1,
                'name' => 'Super Admin',
                'email' => 'admin@app.com',
            ],
        ]);
    }
}

<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'email' => "admin@gmail.com",
            'password' => bcrypt('12345678'),
            'fullname' => "Admin",
            'role' => "admin",
            'status' => 'publish'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test',
            'password' => Hash::make('password'),
        ]);
        
        for ($i = 1; $i <= 20; $i ++) {
            DB::table('users')->insert([
                'name' => 'test'.$i,
                'email' => 'test'.$i.'@gmail.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}

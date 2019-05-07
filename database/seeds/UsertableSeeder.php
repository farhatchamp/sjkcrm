<?php

use Illuminate\Database\Seeder;

class UsertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\User::create([

            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'admin' => 1,
//            'role_id' => 1

        ]);
    }
}

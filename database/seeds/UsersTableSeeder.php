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
            'username' => '五十嵐',
            'mail' => 'ikarashi@hri.com',
            'password' => '0000'
        ]);
        //
    }
}

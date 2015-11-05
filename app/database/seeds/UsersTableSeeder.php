<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{


        DB::table('users')->insert(array('first_name' => 'Akbar',
            'last_name' => 'Khan',
            'email' => 'makhan.amu1@gmail.com',
            'password' => Hash::make('akbar123'),
            'is_active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));



        DB::table('users')->insert(array('first_name' => 'Dr. Mohammad',
            'last_name' => 'H R Mubarak',
            'email' => 'dr.m.alrasman@gmail.com',
            'password' => Hash::make('mubarak123'),
            'is_active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));
	}

}
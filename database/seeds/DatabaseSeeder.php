<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([ //,
            'name' => 'ramz',
            'email' => 'ramz@ramz.com',
            'password' => bcrypt('23132'),
        ]);

        DB::table('settings')->insert([ //,
            'name' => 'test',
            'password' => '12345',
        ]);

        // for ($i=0; $i < 100; $i++) { 
        //     DB::table('rasxods')->insert([ //,
        //         'project_id' => 2,
        //         'rasxod_type' => '1',
        //         'name' => 'Test',
        //         'summa' => random_int(0, 9999),
        //         'data' => date('Y-m-d'),
        //     ]);
        // }
    }
}

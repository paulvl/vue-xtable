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
        App\UserType::create(['name' => 'Administrador']);
        App\UserType::create(['name' => 'Usuario']);
        
        factory(App\User::class, 500)->create();
    }
}

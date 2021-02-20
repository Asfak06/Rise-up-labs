<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::create([
            'first_name' => 'Kati',
            'last_name' => 'Frantz',
            'birth_day' => '1992-01-04',
            'email' => 'bahdcoder@gmail.com',
          ]);

          User::create([
            'first_name' => 'Asfak',
            'last_name' => 'Ahmed',
            'birth_day' => '1996-06-13',
            'email' => 'asfakmunna@gmail.com',
          ]);

          User::create([
            'first_name' => 'Tamim',
            'last_name' => 'Kabir',
            'birth_day' => '1996-08-15',
            'email' => 'tamimkabir@gmail.com',
          ]);
          factory(App\User::class,10)->create();
    }
}

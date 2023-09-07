<?php

namespace Database\Seeders;

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

         $user = new \App\Models\User();
         $user->dpi               = 'UA';
         $user->name              = 'Usuario Administrador';
         $user->username          = 'administrador';
         $user->email             = 'admin@mail.com';
         $user->email_verified_at = now();
         $user->password          = \Hash::make('T3cn0l0g1a**');
         $user->status            = 1;
         $user->agencia_id        = 1;
         $user->role_id           = 1;
         $user->save();

         $user->assignRole('Super Administrador');


    }
}

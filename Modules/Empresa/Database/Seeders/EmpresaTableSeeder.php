<?php

namespace Modules\Empresa\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Empresa\Entities\Empresa;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Empresa();
        $empresa->razon_social = 'Iglesia Cristiana Pentecostés de Venezuela Movimiento Misionero Mundial';
        $empresa->documento    = 'J-25212293-8';
        $empresa->telefono     = '02125058000';
        $empresa->direccion    = 'Caracas - Veneuela';
        $empresa->email        = 'mmmvnzla@gmail.com.ve';
        $empresa->logo_empresa = 'logo_verde.png';
        $empresa->is_active    = 1;
        $empresa->save();


        $user = new User();
        $user->name              = 'Theizer Gonzalez';
        $user->username          = 'administrador';
        $user->empresa_id        = 1;
        $user->email             = 'admin@mail.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('admin123');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 1;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();


        $user->assignRole('Administrador');


        $user = new User();
        $user->name              = 'Ricardo Manrique';
        $user->username          = 'rmarique';
        $user->empresa_id        = 1;
        $user->email             = 'rmanrique@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('admin123');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 2;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Supervisor Nacional');


        $user = new User();
        $user->name              = 'Michael Páez';
        $user->username          = 'mpaez';
        $user->empresa_id        = 1;
        $user->email             = 'mpaez@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('admin123');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 4;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Presbitero');

        $user = new User();
        $user->name              = 'Diana Rojas';
        $user->username          = 'drojas';
        $user->empresa_id        = 1;
        $user->email             = 'drojas@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('123456');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 5;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Secretaria Nacional');


        $user = new User();
        $user->name              = 'Keilyn Machado';
        $user->username          = 'kmachado';
        $user->empresa_id        = 1;
        $user->email             = 'kmachado@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('123456');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 5;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Secretaria Nacional');


        $user = new User();
        $user->name              = 'Gledis Hernández';
        $user->username          = 'ghernandez';
        $user->empresa_id        = 1;
        $user->email             = 'ghernandez@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('123456');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 5;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Secretaria Nacional');


        $user = new User();
        $user->name              = 'Theizer Gonzalez';
        $user->username          = 'tgonzalez';
        $user->empresa_id        = 1;
        $user->email             = 'tgonzalez@mmmvnzla.com';
        $user->email_verified_at = date('Y-m-d H:i:s') ;
        $user->password          = Hash::make('123456');
        $user->status            = 1;
        $user->zona              = 1;
        $user->role_id           = 5;
        $user->created_at        = date('Y-m-d H:m:s');
        $user->save();

        $user->assignRole('Secretaria Nacional');


    }
}

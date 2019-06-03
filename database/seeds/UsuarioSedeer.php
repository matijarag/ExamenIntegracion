<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_usu'=>1,
            'name'=>'Pablo Pinilla',
            'email'=>'admin@admin.com',
            'rut'=>null,
            'password'=>'$2y$12$DpZ5dNq3HNgsgpYeFcKtWunvvQKnySAQFUZm/QXprGdYWCEmQUOyC',
            'id_tipo_usuario'=>1,
            'telefono'=>'999999999'
        ]);

        User::create([
            'id_usu'=>2,
            'name'=>'Pablo Pinilla',
            'email'=>'operador@operador.com',
            'rut'=>null,
            'password'=>'$2y$12$DpZ5dNq3HNgsgpYeFcKtWunvvQKnySAQFUZm/QXprGdYWCEmQUOyC',
            'id_tipo_usuario'=>2,
            'telefono'=>'999999999'
        ]);

        User::create([
            'id_usu'=>3,
            'name'=>'Pablo Pinilla',
            'email'=>'alumno@alumno.com',
            'rut'=>'187495962',
            'password'=>'$2y$12$DpZ5dNq3HNgsgpYeFcKtWunvvQKnySAQFUZm/QXprGdYWCEmQUOyC',
            'id_tipo_usuario'=>3,
            'telefono'=>'999999999'
        ]);

        User::create([
            'id_usu'=>4,
            'name'=>'Pablo Pinilla',
            'email'=>'carrera@carrera.com',
            'rut'=>null,
            'password'=>'$2y$12$DpZ5dNq3HNgsgpYeFcKtWunvvQKnySAQFUZm/QXprGdYWCEmQUOyC',
            'id_tipo_usuario'=>4,
            'telefono'=>'999999999'
        ]);
    }
}

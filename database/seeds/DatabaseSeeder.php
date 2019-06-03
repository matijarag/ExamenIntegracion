<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoUsuarioSedeer::class);
        $this->call(EstadoHoraSedeer::class);
        $this->call(EstadoCitaSedeer::class);
        $this->call(UsuarioSedeer::class);
    }
}

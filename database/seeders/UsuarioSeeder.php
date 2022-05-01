<?php

namespace Database\Seeders;
use App\Models\Usuarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuarios = new Usuarios();
        $usuarios->usuario = "amontero";
        $usuarios->contrasenia = Hash::make("amontero");
        $usuarios->save();

        $usuarios2 = new Usuarios();
        $usuarios2->usuario = "bmoreno";
        $usuarios2->contrasenia = Hash::make("bmoreno");
        $usuarios2->save();
    }
}

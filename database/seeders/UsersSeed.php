<?php

namespace Database\Seeders;

use App\Models\Choferes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    public function run(): void
    {
        // $user = new User();
        // $user->name = "Mauricio Aponte";
        // $user->document = 3909000;
        // $user->password = bcrypt('12345');
        // $user->save();

        $choferes = Choferes::all();
        foreach($choferes as $chofer):
            $user = new User();
            $user->name = $chofer->nombre;
            $user->document = $chofer->documento;
            $user->password = bcrypt('12345');
            $user->save();
        endforeach;
    }
}

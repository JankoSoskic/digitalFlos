<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\Uloge;

class seedUloge extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zaUnos = ["Korisnik","Admin"];
        foreach($zaUnos as $jedan){
            $novi = new Uloge();
            $novi->naziv = $jedan;
            $novi->save();
        }
    }
}

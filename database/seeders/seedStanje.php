<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\Stanje;
class seedStanje extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zaUnos = ["Prihvacen","Odbijen"];
        foreach($zaUnos as $jedan){
            $novi = new Stanje();
            $novi->naziv = $jedan;
            $novi->save();
        }
    }
}

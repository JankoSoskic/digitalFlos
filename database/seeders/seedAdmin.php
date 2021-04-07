<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Korisnici;


class seedAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $novi = new Korisnici();
            $novi->Ime = "Admin";
            $novi->prezime = "Admin";
            $novi->email = "Admin@gmail.com";
            $novi->password = md5("Solsker1234");
            $novi->id_uloge = 2;
            $novi->save();
    }
}

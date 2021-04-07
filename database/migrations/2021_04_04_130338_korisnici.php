<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Korisnici extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korisnici', function (Blueprint $table) {
            $table->id();
            $table->string('Ime');
            $table->string('prezime');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId("id_uloge");
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

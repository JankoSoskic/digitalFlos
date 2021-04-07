<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Objave extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objave', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_korisnik");
            $table->string('naslov');
            $table->string('text');
            $table->string('putanjaSlike');
            $table->boolean('pregledana')->default(false);
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

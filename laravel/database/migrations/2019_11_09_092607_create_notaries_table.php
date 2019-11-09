<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notaries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('REGION');
            $table->string('NAME_OBJ');
            $table->string('CONTACTS');
            $table->string('FIO');
            $table->string('LICENSE');

            $table->float('lat', 9,6)->nullable();
            $table->float('lng', 9,6)->nullable();

            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notaries');
    }
}

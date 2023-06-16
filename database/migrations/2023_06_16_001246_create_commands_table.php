<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('Address');
            $table->string('city');
            $table->string('card_number');
            $table->date('date_command');
            $table->date('date_reciept');
            $table->text('products');
            $table->string('statut')->default('non valid');
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
        Schema::dropIfExists('commands');
    }
}

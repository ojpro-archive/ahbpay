<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner');
            $table->string('holder_name')->nullable();
            $table->string('account_number')->unique()->nullable();
            $table->string('iban')->nullable();
            $table->string('cvv')->nullable();
            $table->string('balance')->nullable();
            $table->string('expiration')->nullable();
            $table->string('bank_name')->nullable();

            $table->timestamps();

            $table->foreign('owner')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}

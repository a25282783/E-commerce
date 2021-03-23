<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tel')->default('');
            $table->string('fax')->default('');
            $table->string('email')->default('');
            $table->string('address')->default('');
            $table->text('payment')->nullable();
            $table->text('shipping')->nullable();
            $table->text('return')->nullable();
            $table->text('service')->nullable();
            $table->text('privacy')->nullable();
            $table->string('line')->default('');
            $table->string('fb')->default('');
            $table->string('ig')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
}

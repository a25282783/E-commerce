<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('delivery')->comment('運送方式圖片');
            $table->string('delivery_name')->comment('運送方式說明');
            $table->text('delivery_desc')->comment('運送方式')->nullable();
            $table->string('payment')->comment('付款方式圖片');
            $table->string('payment_name')->comment('付款方式說明');
            $table->text('payment_desc')->comment('付款方式')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basics');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('category_id');
            $table->string('name')->default('');
            $table->text('intro')->nullable();
            $table->string('prev_img')->default('');
            $table->json('img')->nullable();
            $table->unsignedBigInteger('amount');
            $table->unsignedInteger('price')->nullable();
            $table->string('spec')->nullable();
            $table->string('weight')->nullable();
            $table->string('place')->nullable();
            $table->text('ship_way')->nullable();
            $table->text('refund_way')->nullable();
            $table->json('color')->nullable();
            $table->json('size')->nullable();
            $table->json('pack')->nullable();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

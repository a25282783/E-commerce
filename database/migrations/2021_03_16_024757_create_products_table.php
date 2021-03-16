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
            $table->string('intro')->default('');
            $table->string('prev_img')->default('');
            $table->json('img')->nullable();
            $table->unsignedBigInteger('amount');
            $table->json('detail')->nullable();
            $table->string('banner')->default('');
            $table->text('feature')->nullable();
            $table->text('package')->nullable();
            $table->text('exterior')->nullable();
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

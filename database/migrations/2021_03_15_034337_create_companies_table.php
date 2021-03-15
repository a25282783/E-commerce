<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('banner')->default('');
            $table->string('title1')->default('');
            $table->text('content')->nullable();
            $table->string('main')->default('');
            $table->string('title2')->default('');
            // 4圖配4段字
            $table->string('main_title1')->default('');
            $table->string('main_desc1')->default('');
            $table->string('main_title2')->default('');
            $table->string('main_desc2')->default('');
            $table->string('main_title3')->default('');
            $table->string('main_desc3')->default('');
            $table->string('main_title4')->default('');
            $table->string('main_desc4')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeToFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('mid_banner')->default('');
            $table->string('mid_url')->default('');
            $table->string('mid_title')->default('');
            $table->text('mid_text')->nullable();
            $table->string('mid_video')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            //
        });
    }
}

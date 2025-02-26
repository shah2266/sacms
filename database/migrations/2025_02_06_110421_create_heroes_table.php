<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('page_id');
            $table->string('title')->unique();
            $table->string('title_color')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('sub_title_color')->nullable();
            $table->text('short_description')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('image')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->enum('type', ['banner', 'slider'])->default('banner');
            $table->tinyInteger('status')->default(1)->comment('0: Inactive, 1: Active');
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
        Schema::dropIfExists('heroes');
    }
}

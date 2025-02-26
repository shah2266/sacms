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
            $table->string('company_name')->unique();
            $table->string('short_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('favicon')->nullable();
            $table->string('image')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('business_model')->nullable();
            $table->integer('number_of_offices')->nullable()->default(1);
            $table->text('mission_statement')->nullable();
            $table->text('vision_statement')->nullable();
            $table->string('copy_right_statement')->nullable();
            $table->string('founded_date')->nullable();
            $table->integer('employee_count')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('licence_key')->default('dev_shah');
            $table->tinyInteger('status')->default(0)->comment('0: Inactive, 1: Active');
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
        Schema::dropIfExists('companies');
    }
}

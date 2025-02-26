<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // Belongs to a menu
            $table->string('title'); // Menu item name
            $table->string('url')->nullable(); // Custom URL
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade'); // Link to pages
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('cascade'); // Parent menu item
            $table->integer('order')->default(0); // Order for sorting
            $table->boolean('status')->default(0)->comment('0: Inactive, 1: Active');
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
        Schema::dropIfExists('menu_items');
    }
}

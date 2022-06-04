<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subcategory_id');
            $table->string('name');
            $table->string('specifications');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('item_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('item_datasheets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('item_usermanuals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->string('file');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_images');
        Schema::dropIfExists('item_datasheets');
        Schema::dropIfExists('item_usermanuals');
    }
}

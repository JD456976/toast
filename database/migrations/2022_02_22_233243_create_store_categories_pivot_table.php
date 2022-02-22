<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_categories_pivot', function (Blueprint $table) {
            $table
                ->bigInteger('store_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->onDelete('cascade');
            $table
                ->bigInteger('store_category_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('store_category_id')
                ->references('id')
                ->on('store_categories')
                ->onDelete('cascade');
            $table->primary(['store_id', 'store_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_categories_pivot');
    }
};

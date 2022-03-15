<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('bounties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('deal_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->string('item_name');
            $table->string('slug')->nullable();
            $table->string('description');
            $table->string('item_url');
            $table->boolean('is_filled');
            $table->foreignId('filled_id')->constrained('users');
            $table->boolean('is_verified');
            $table->boolean('is_active');
            $table->boolean('is_featured');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('bounties');
    }
}

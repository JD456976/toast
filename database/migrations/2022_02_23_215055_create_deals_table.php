<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('store_id')->constrained('stores');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('approver_id')->constrained('users');
            $table->string('title');
            $table->string('discount');
            $table->string('price');
            $table->string('price_extras');
            $table->string('description');
            $table->string('url');
            $table->string('slug')->nullable();
            $table->boolean('is_active');
            $table->boolean('is_frontpage');
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
        Schema::dropIfExists('deals');
    }
}

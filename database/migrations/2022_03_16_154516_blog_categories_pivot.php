<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogCategoriesPivot extends Migration
{
    public function up()
    {
        Schema::create('blog_categories_pivot', function (Blueprint $table) {
            $table
                ->bigInteger('blog_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->onDelete('cascade');
            $table
                ->bigInteger('blog_category_id')
                ->unsigned()
                ->index();
            $table
                ->foreign('blog_category_id')
                ->references('id')
                ->on('blog_categories')
                ->onDelete('cascade');
            $table->primary(['blog_id', 'blog_category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_categories_pivot');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('footer_menu')
                ->after('is_active')
                ->default(0);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('header_menu')
                ->after('footer_menu')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('footer_menu');
            $table->dropColumn('header_menu');
        });
    }
};

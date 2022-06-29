<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBioAndWebsiteColumnsToUserTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')
                ->nullable()
                ->after('email');
            $table->string('website')
                ->nullable()
                ->after('bio');
            $table->string('country')
                ->nullable()
                ->after('website');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('website');
            $table->dropColumn('bio');
            $table->dropColumn('country');
        });
    }
}

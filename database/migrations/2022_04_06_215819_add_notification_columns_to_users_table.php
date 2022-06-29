<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('comment_notifications')
                ->after('email')
                ->default(true);
            $table->boolean('followers_notifications')
                ->after('comment_notifications')
                ->default(true);
            $table->boolean('deal_notifications')
                ->after('followers_notifications')
                ->default(true);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('comments_notifications');
            $table->dropColumn('followers_notifications');
            $table->dropColumn('deal_notifications');
        });
    }
};

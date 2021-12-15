<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookmarksColumnToVisibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visibilities', function (Blueprint $table) {
            $table->boolean('bookmarks')->default(0)->after('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visibilities', function (Blueprint $table) {
            $table->dropColumn('bookmarks');
        });
    }
}

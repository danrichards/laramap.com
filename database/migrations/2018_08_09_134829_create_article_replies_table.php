<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_replies', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('article_id');
            $table->unsignedInteger('user_id');

            $table->longText('body');

            $table->boolean('is_marked')->default(false);

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
        Schema::dropIfExists('article_replies');
    }
}

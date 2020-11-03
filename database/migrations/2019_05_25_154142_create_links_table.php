<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('user_id')->index();
            $table->string('url');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id', 'links_user_id_foreign')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropForeign('links_user_id_foreign');
        });

        Schema::dropIfExists('links');
    }
}

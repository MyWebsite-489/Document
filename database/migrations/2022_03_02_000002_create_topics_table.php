<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name', 120);
            $table->string('alias', 255);
            $table->string('description', 255);
            $table->string('thumbnail', 255)->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->enum('status', [STATUS_PUBLISH, STATUS_DRAFT]);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
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
        Schema::dropIfExists('topics');
    }
}

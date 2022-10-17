<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostChildDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_child_documents', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("topic_document_id");
            $table->string('name', 120);
            $table->string('description', 255);
            $table->longText('content');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('topic_document_id')
                ->references('id')
                ->on('topic_documents')
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
        Schema::dropIfExists('post_child_documents');
    }
}

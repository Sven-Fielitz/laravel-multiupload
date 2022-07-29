<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Erstellen der Projekttabellen

        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->string('orginal_filename');
            $table->string('filename');
            $table->string('title');
            $table->text('comment');
            $table->bigInteger("uploadedSize");
            $table->bigInteger("fileSize");
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
        //
    }
};

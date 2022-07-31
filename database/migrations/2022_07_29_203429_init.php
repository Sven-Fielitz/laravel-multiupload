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

        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('orginal_filename');
            $table->string('filename')->nullable();
            $table->string('title')->nullable();
            $table->enum('status', ['ANNOUNCED', 'UPLOADING', 'COMPLETED', 'CORRUPTED']);
            $table->text('comment')->nullable();
            $table->bigInteger("uploadedSize")->default(0);
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

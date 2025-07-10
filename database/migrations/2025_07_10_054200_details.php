<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('details_information', function(Blueprint $table) {
            $table->id('id');
            $table->string('details_information');
            $table->string('task_id');
            $table->string('details_status');
            $table->longText('details_images')->nullable();

            $table->foreign('task_id')->references('task_id')->on('task_information');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
